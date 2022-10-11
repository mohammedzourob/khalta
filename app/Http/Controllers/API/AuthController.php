<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

// REQUESTS
use Illuminate\Http\Request;
use App\Http\Requests\API\SignUpRequest;

// REPOSITORIES
use App\Repositories\UserRepo;

//Mail
use App\Mail\VerifyCode;
use App\Mail\ResetPassword;


// EXCEPTIONS
//use SimpleSoftwareIO\QrCode\Facades\QrCode;
//use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;

// MODELS
use App\Models\Country;
use App\Models\User;

use Hash;
//use Laravel\Passport\Token;

class AuthController extends Controller
{
    protected $user;
    protected $userDevice;

    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }


    public function signup(SignUpRequest $request)
    {

        $code = rand(1111,9999);

        $data = $request->except(['password' ,'password_confirmation']);
        $data['password'] =bcrypt($request->get('password'));
        $data['code'] =$code;

        // CREATE USER
        $user = $this->user->create($data);
        // send code verify

        if ($user) {
            DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token'=>$code,
                'created_at'=>Carbon::now(),
            ]);

            Mail::to($user)->send(new VerifyCode($user));

            // GENERATE TOKEN
            $token = $user->createToken('mobile')->accessToken;
            $user['token']=$token ;

            // RESPONSE
            $response = [
                'success' => true,
                'data'    => $user,
                'message' => __('api.email_verify')
            ];

            return response()->json($response, 200);
        }

    }

    public function verifyCode(Request $request)
    {
        $validator =Validator::make($request->all(),[
            'email' => 'required|email',
            'confirm_code' => 'required|digits:4',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 400, 'message' => implode("\n", $validator->messages()->all())]);
        }

        $check_token = DB::table('password_resets')
            ->where('email',$request->email)
            ->where('token',$request->confirm_code)
            ->where('created_at','>', Carbon::now()->subHours(2))
            ->first();

        $user = User::query()->where('email', $request->email)->first();

        if($check_token){
            $user->is_verify= 'YES';
            $user->email_verified_at= Carbon::now();
            $user->save();

            DB::table('password_resets')->where('email',$request->email)->delete();
            $token = $user->createToken('mobile')->accessToken;


            $message= __('api.ok');
            return response()->json(['status' => true, 'code' => 200, 'message' => $message ,
                'access_token' => $token , 'token_type' => 'Bearer']);
        }else{
            $message= __('api.you_have_some_error');

            return response()->json(['status' => false, 'code' => 203, 'message' => $message]);
        }
    }

    protected function resendVerify(Request $request){
        $data =Validator::make($request->all(),[
            'email' => 'required|string|email',
        ]);
        if ($data->fails())
            return response()->json(['message'=> $data->messages(),'status'=>400]);

        $code = rand(1111,9999);
        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$code,
            'created_at'=>Carbon::now(),
        ]);

        $user = User::query()->where('email', $request->email)->first();

        Mail::to($user)->send(new VerifyCode($user));

        return response()->json([
            'status' => 200,
            'message' => trans('api.email_verify'),
        ]);
    }

    public function login(Request $request)
    {
        dd('a');
        $email = $request->get('email');
        $password = $request->get('password');

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 204,
                'message' => implode("\n", $validator->messages()->all())]);
        }

        if (Auth::once(['email' => $email, 'password' => $password]) ) {
            $user = Auth::user();
            // return $user;
            $user['accessToken'] = $user->createToken('mobile')->accessToken;

            if($user->is_verify == 'NO'){
                $message= __('api.active_code');
                return response()->json(['status' => true, 'code' => 210, 'message' => $message , 'user' => $user]);
            }

            if($user->type == 0){
                $message= __('api.complete_login');
                return response()->json(['status' => true, 'code' => 200, 'message' => $message , 'user' => $user]);
            }

            $message= __('api.ok');
            return response()->json(['status' => true, 'code' => 200,
                'message' => $message , 'user' => $user]);

        } else {
            $EmailData = User::query()->where(['email' => $email])->first();
            if ($EmailData) {
                $message= __('api.password_wrong');
                return response()->json(['status' => false, 'code' => 204, 'message' => $message]);
            } else {
                $message= __('api.email_not_found');
                return response()->json(['status' => false, 'code' => 204, 'message' => $message]);
            }
        }
    }

    public function forgotPassword(Request $request)

    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 200,
                'message' =>implode("\n",$validator-> messages()-> all()) ]);
        }
        $user = User::where('email',$request->email)->first();

        if (!$user) {
            $message = 'الإيميل غير موجود لدينا';
            return response()->json(['status' => false, 'code' => 201,'message' => $message ]);
        }

        $new_password = rand(100000, 999999);
        $password = bcrypt($new_password);
        $user->password=$password;
        $user->save();

        Mail::to($user)->send(new ResetPassword($user ,$new_password));

        $user['accessToken'] = $user->createToken('mobile')->accessToken;

        $message='تم إرسال كلمة مرور جديدة للبريد الإلكتروني المدخل';
        return response()->json(['status' => true, 'code' => 200,'message' => $message ]);
    }

    // الدول
    public function getCountries(Request $request){
        $localization=$request->header('localization');
        $data = Country::query()->select([
            'id',
            'nationality_'.$localization.' as nationality'
        ])->get();

        $message = __('api.ok');
        return response()->json(['status' => true, 'code' => 200, 'message' => $message, 'countries' => $data]);

    }


}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\Sections;
use App\Models\Token_firebase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;



class UserController extends Controller
{

    public function index(){
        $user_id=auth('api')->user()->id;
        $user = User::where('id',$user_id)->first();
        // $accessToken= $user->createToken('mobile')->accessToken;

        return parent::success($user);

     // return response()->json(['status' => true, 'code' => 200,'accessToken'=>$accessToken]);

    }
    public function indexuser(Request $request)
    {
      $data=User::all();
      return parent::success( $data);
    }

    public function register(Request $request)
    {

//          return $request->all();
        $validation = Validator::make($request->all(),User::$rules);
        if ($validation->fails()){
            return parent::error( $validation->errors());
        }
        $request['password']= Hash::make($request->input('password'));
        $request['image']= 'users_image\user.jpg';

        $request['type']= 3;
        $request['Status']= "1";


        $user = User::create($request->all());

        if ($request->has('fcm_token')) {
            Token_firebase::create(['fcm_token' => $request->get('fcm_token'),'user_id' => $user->id]);
        }


        $token = $user->createToken('mobile')->accessToken;
        $user['token']=$token ;

        return parent::success( $user);

    }
    public function editUser(Request $request){

        $user_id=auth('api')->user()->id;

        $data = $request->all();

        $data['id']=$user_id;

        $rules = [
            'email' => 'required|email|unique:users,email,'.$user_id,
        ];

        $validation = Validator::make($request->all(),$rules);
        if ($validation->fails()){
            return parent::error( $validation->errors());
        }


        $users = User::find($user_id);

        if(!$users){

            $message= __('not_found');
            return parent::error($message);
//            return response()->json(['status' => false, 'code' => 203, 'message' => $message]);
        }


        $users->name = request('name');
        $users->email = request('email');
        $users->phone = request('phone');
        $users->City = request('City');


        if ($request->file('image') ) {
            $name = Str::random(12);
            $path = $request->file('image')->move('api/users_image',
                $name . time() . '.' . $request->file('image')->getClientOriginalExtension());
            $users->image= $path;
        }

        $users->update();
        $users->refresh();

        return parent::success( $users);


    }


    public function login(Request $request)
    {

        $email = $request->get('email');
        $password = $request->get('password');

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return parent::error( $validator->errors());
//            return response()->json(['status' => false, 'code' => 400,
//                'message' => implode("\n", $validator->messages()->all())]);
        }

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password]) ) {
        //     $user = $request->user();
        //     // return $user;


        //     //user type in power
        //     $type=$user->type;

        //     //return token
        //     $accessToken= $user->createToken('mobile')->accessToken;


        if (Auth::once(['email' => $email, 'password' => $password , 'Status' => '1']) ) {
            $user = Auth::user();
            // return $user;
            $user['accessToken'] = $user->createToken('mobile')->accessToken;

            if ($request->has('fcm_token')) {
            $is_token =    Token_firebase::where('user_id',$user->id)->where('fcm_token' ,$request->get('fcm_token'))->first();
                if(!$is_token){
                  $token_create = Token_firebase::create(['fcm_token' => $request->get('fcm_token'),'user_id' => $user->id]);
                }

            }




            $message= __('api.ok');

            // return response()->json(['status' => true, 'code' => 200, 'message' => $message,'type'=> $type,'accessToken'=>$accessToken]);

            return parent::success( $user);





        } else {
            $EmailData = User::query()->where(['email' => $email])->first();

            if ($EmailData) {
                $message= __('the password wrong');
                return parent::error( $message);
                // return response()->json(['status' => false, 'code' => 204, 'message' => $message]);
            } else {
                $message= __('the email not found');
                return parent::error( $message);
                // return response()->json(['status' => false, 'code' => 204, 'message' => $message]);
            }
        }
    }

    public function logout(Request $request)
    {

        $user=  $request->user()->tokens()->delete();

        return parent::success( $user);

    }
    public function forgotPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
        ]);
        if ($validator->fails()) {
            return parent::error( $validator);
        }

        $user = User::where('email',$request->email)->first();

        if (!$user) {
            $message = 'الإيميل غير موجود لدينا';
            return parent::error( $message);
        }


        $new_password = rand(100000, 999999);
        $password =  bcrypt($new_password);;

        $user->password=$password;
        $user->save();

        Mail::to($user)->send(new ResetPassword($user ,$new_password));

//        $user['accessToken'] = $user->createToken('mobile')->accessToken;

//        return parent::success( $user);
        $message='تم إرسال كلمة مرور جديدة للبريد الإلكتروني المدخل';
        return parent::success( $message);
    }

    public function resetPassword(Request $request)
    {
//        dd('a');
        $rules = [
            'old_password' => 'required|min:3',
            'new_password' => 'required|min:3',
            'confirm_password' => 'required|min:3|same:new_password',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'code' => 204,
                'message' => implode("\n", $validator->messages()->all())]);
        }

        $user = auth('api')->user();

        if (!Hash::check($request->get('old_password'), $user->password)) {
            $message = __('api.old_password'); //wrong old
            return response()->json(['status' => false, 'code' => 201, 'message' => $message,
                'validator' => $validator]);
        }
        //Token::where('user_id', $user->id)->delete();
        // $user->AauthAcessToken()->delete();
//        $user->token()->revoke();


        $user->password = bcrypt($request->get('new_password'));
        $data=$user->save();
        if ($data) {
            $user->refresh();
//            $user['accessToken'] = $user->createToken('mobile')->accessToken;

            return parent::success( $user);
//            $message = __('api.ok');
//            return response()->json(['status' => true, 'code' => 202, 'message' => $message  , 'user' => $user]);
        }
        $message = __('api.whoops');
        return parent::error( $message);
    }
    public function rules(): array
    {
        return [
            'email' => 'required|unique:User,email,'.$this->user('api')->id,
//            'qualification_id' => 'required|exists:qualifications,id',
//            'country_id' => 'required|exists:countries,id',
//            'section_id' => 'sometimes|nullable|exists:sections,id',
//            'field_other' => 'string|sometimes|nullable',
//            'city' => 'string|required',
//            'is_volunteered' => 'required|in:YES,NO',
//            'experiences' => 'sometimes|nullable|string',
//            'skills' => 'sometimes|nullable|string',
//            'times' => 'required',
//            'twitter' => 'sometimes|nullable|string',
//            'instagram' => 'sometimes|nullable|string',
//            'snapchat' => 'sometimes|nullable|string',

        ];
    }
}

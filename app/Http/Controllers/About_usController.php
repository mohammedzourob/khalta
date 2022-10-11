<?php

namespace App\Http\Controllers;

use App\Models\About_us;
use App\Models\Contracts;
use App\Models\Sections;
//use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF\Facade\Pdf;
//use Barryvdh\DomPDF\PDF;
use App\Models\User;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Str;
use PDF;

class About_usController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $about_us =About_us::find(1);
//      return $about_us;

      return view('about_us.about_us',compact('about_us'));
  }
    public function exportPDF() {
//      return view('export_pdf');

//        $data = [
//            'foo' => 'bar'
//        ];
//        $pdf = PDF::loadView('pdf.document', $data);
//        return $pdf->stream('document.pdf');
        $p = Contracts::where('id',1)->with('user')->first();


        $pdf = PDF::loadView('export_pdf',compact('p'));
//        return response()->json($pdf);
        $path = public_path('pdf_docs/');

        $fileName =  time().'.'. 'pdf' ;
        $pdf->save($path . '/' . $fileName);
        $generated_pdf_link ='pdf_docs/'.$fileName;
        ini_set('max_execution_time', 180);
        return response()->json($generated_pdf_link);

    }
    /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request)
  {
//      return $request->all();


      $sections = About_us::find(1);

      $sections->update($request->all());


      session()->flash('Add', 'تم تعديل المحتوى  بنجاح ');

      return redirect('dashboard/settings');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>

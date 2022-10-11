@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')

@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> العقود </h4>

                <span class="text-muted mt-1 tx-13 mr-2 mb-0"> / بيانات السعر</span>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


    <div class="col-lg-12 col-md-12">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>خطا</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            <div class="card-body">
                <br>



                <form class="parsley-style-1" id="selectForm2" autocomplete="off" name="selectForm2" enctype="multipart/form-data"
                    action="updatePrice" method="post">
                    {{ method_field('patch') }}
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$contracts->id}}">


                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label>مدة المشروع : <span class="tx-danger">(شهر)</span>

                                </label>
                                <input class="form-control form-control-md mg-b-20"
                                       data-parsley-class-handler="#lnWrapper" name="duration_project"   type="number">

                            </div>

                            @if ($contracts->construction_type == 1 and ($contracts->project_id == 1 or $contracts->project_id == 2 or $contracts->project_id == 3 or $contracts->project_id == 4))
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>مدة ضمان الاعمال : <span class="tx-danger">(شهر)</span></label>
                                <input class="form-control form-control-md mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="Work_guarantee_period"   type="number">
                            </div>
                                @endif

                        </div>


                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <h3>تفاصيل الأسعار(الأتعاب) </h3>
                            <hr>
                        </div>
                        @if($contracts->project_id == 1 or $contracts->project_id == 2 or $contracts->project_id == 3 or $contracts->project_id == 4 )
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>سعر المتر المربع للسقف أو الملاح  العلوية أو بيت  الدرج : <span class="tx-danger">(ريال سعودي)</span></label>
                            <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="price1"   type="number">
                        </div>
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>سعر المتر الطولي للسور بما فيه البوابات : <span class="tx-danger">(ريال سعودي)</span></label>
                            <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                   name="price2"   type="number">
                        </div>
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>سعر المتر الطولي للسترة  : <span class="tx-danger">(ريال سعودي)</span></label>
                            <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                   name="price3"   type="number">
                        </div>
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>سعر المتر المربع للخزان الأرضي أو القبو : <span class="tx-danger">(ريال سعودي)</span></label>
                            <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                   name="price4"   type="number">
                        </div>
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>سعر المتر المربع للبياره : <span class="tx-danger">(ريال سعودي)</span></label>
                            <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                   name="price5"   type="number">
                        </div>
                    @endif

                        @if($contracts->project_id == 5  )

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> سعر المتر المربع مصنعية لياسة داخلية شاملاٌ للحوائط والأسقف والسور : <span class="tx-danger">(ريال سعودي)</span></label>
                            <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                   name="price1"   type="number">
                        </div>
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>سعر المتر المربع مصنعية لياسة خارجية : <span class="tx-danger">(ريال سعودي)</span></label>
                            <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                   name="price2"   type="number">
                        </div>
                        @endif

                        @if($contracts->project_id == 7  )

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label> سعر المتر المربع للسقر مصنعية دهان البلاستيك : <span class="tx-danger">(ريال سعودي)</span></label>
                                <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="price1"   type="number">
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>سعر المتر المربع مصنعية دهان زياتي : <span class="tx-danger">(ريال سعودي)</span></label>
                                <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="price2"   type="number">
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>سعر المتر المربع مصنعية ركة أو دهان خارجي (المسطحات التي تحتاج إلى سقايل)  : <span class="tx-danger">(ريال سعودي)</span></label>
                                <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="price3"   type="number">
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>سعر دهان الباب الخشبي الواحد بما فيه الحلق : <span class="tx-danger">(ريال سعودي)</span></label>
                                <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="price4"   type="number">
                            </div>
                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>سعر دهان الباب الحديد  الواحد بما فيه الحلق : <span class="tx-danger">(ريال سعودي)</span></label>
                                <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                       name="price5"  type="number">
                            </div>
                        @endif




                    </div>

                    <div class="row row-sm mg-b-20">
                        <div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <h3>الدفعات </h3>
                            <hr>
                        </div>
                        <input type="hidden" class="form-control"  name="status" value="1">
                        <div class="col-lg-6">
                            <label>الملبلغ الاجمالي: <span class="tx-danger">(ريال سعودي)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="price"  type="number">
                        </div>
                        <div class="col-lg-6">
                            <label>تفاصيل اخرى عن السعر : <span class="tx-danger">(سوف تصل للمستخدم داخل الاشعارات)</span></label>
                            <textarea class="form-control" placeholder="تفاصيل اخرى عن السعر(اختياري)" rows="3" spellcheck="false"  name="price_details"></textarea>

{{--                            <input class="form-control form-control-md mg-b-20"--}}
{{--                                   data-parsley-class-handler="#lnWrapper" name="phone"  type="text">--}}

                        </div>

                        <div class="col-lg-6">
                            <label>نسبة الدفعة الاولى : <span class="tx-danger">(%)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="paying1"  type="number">
                        </div>
                        <div class="col-lg-6">
                            <label>تفاصيل الدفعة الأولى : <span class="tx-danger">(بعد)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="payment_content1"  type="text">

                        </div>

                        <div class="col-lg-6">
                            <label>نسبة الدفعة الثانية : <span class="tx-danger">(%)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="paying2"  type="number">
                        </div>
                        <div class="col-lg-6">
                            <label>تفاصيل الدفعة الثانية : <span class="tx-danger">(بعد)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="payment_content2"  type="text">

                        </div>

                        <div class="col-lg-6">
                            <label>نسبة الدفعة الثالثة : <span class="tx-danger">(%)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="paying3"  type="number">
                        </div>
                        <div class="col-lg-6">
                            <label>تفاصيل الدفعة الثالثة : <span class="tx-danger">(بعد)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="payment_content3"  type="text">

                        </div>

                        <div class="col-lg-6">
                            <label>نسبة الدفعة الرابعة : <span class="tx-danger">(%)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="paying4"  type="number">
                        </div>
                        <div class="col-lg-6">
                            <label>تفاصيل الدفعة الرابعة : <span class="tx-danger">(بعد)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="payment_content4"  type="text">

                        </div>

                        <div class="col-lg-6">
                            <label>نسبة الدفعة الخامسة : <span class="tx-danger">(%)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="paying5"  type="number">
                        </div>
                        <div class="col-lg-6">
                            <label>تفاصيل الدفعة الخامسة : <span class="tx-danger">(بعد)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="payment_content5"  type="text">

                        </div>

                        <div class="col-lg-6">
                            <label>نسبة الدفعة السادسة : <span class="tx-danger">(%)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="paying6"  type="number">
                        </div>
                        <div class="col-lg-6">
                            <label>تفاصيل الدفعة السادسة : <span class="tx-danger">(بعد)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="payment_content6"  type="text">

                        </div>
                    @if( !($contracts->project_id == 7 or $contracts->project_id == 5) )
                        <div class="col-lg-6">
                            <label>نسبة الدفعة السابعة : <span class="tx-danger">(%)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="paying7"  type="number">
                        </div>
                        <div class="col-lg-6">
                            <label>تفاصيل الدفعة السابعة : <span class="tx-danger">(بعد)</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="payment_content7"  type="text">

                        </div>
                        @endif

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{trans('users_visitors.Submit')}}</button>

                            <a class="btn btn-secondary" data-effect="effect-scale" style="font-weight: bold; color: beige;"  href="{{ route('user_customers.index') }}">{{trans('users_visitors.Close')}}</a>

                    </div>
         </form>
            </div>
        </div>


<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')


<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection

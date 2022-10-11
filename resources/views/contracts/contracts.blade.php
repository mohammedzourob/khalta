@extends('layouts.master')
@section('css')

    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@section('title')
    الاقسام
@stop
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('occupation.Settings')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                العقود</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row">


        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="row row-xs wd-xl-80p">
{{--                        <div class="col-sm-6 col-md-3 mg-t-10">--}}
{{--                            <button class="btn btn-info-gradient btn-block">--}}
{{--                                <a  data-toggle="modal" href="#modaldemo8" style="font-weight: bold; color: beige;">إضافة قسم</a>--}}
{{--                            </button>--}}

{{--                        </div>--}}
                    </div>
                </div>




                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='10'
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
{{--                                <th class="border-bottom-0">{{trans('occupation.Profession_name')}}</th>--}}
                                <th class="border-bottom-0">كود العقد</th>
                                <th class="border-bottom-0">اسم صاحب العقد</th>
                                <th class="border-bottom-0">رقم بطاقة الاحوال </th>
                                <th class="border-bottom-0"> المشروع</th>
                                <th class="border-bottom-0">قسم المشروع</th>
                                <th class="border-bottom-0">نوع البناء</th>
                                <th class="border-bottom-0">ملحق الشروط الخاصة</th>

                                <th class="border-bottom-0">حالة المشروع</th>
                                <th class="border-bottom-0">حالة المشاهدة</th>
                                <th class="border-bottom-0">{{trans('occupation.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($contracts as $x)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>

{{--                                    <td><img src="{{url('').$x->icon}}"></td>--}}
                                    <td>{{ $x->code }}</td>
                                    <td>{{ $x->user->name }}</td>
                                    <td style="">
                                        {{ $x->id_card_number }}
                                    </td>
                                    <td style="">
                                        {{ !empty($x->project->name) ?  $x->project->name : 'لا يوجد'}}
                                    </td>
                                    <td style="">
                                        {{ !empty($x->section->name) ?  $x->section->name : 'لا يوجد'}}
                                    </td>


                                    <td style="">
                                        @if ($x->construction_type == 1)

                                         <p> البناء بمواد</p>

                                        @else
                                            <p> البناء بدون بمواد</p>
{{--                                            <button class="btn btn-danger-gradient btn-block">البناء بدون مواد</button>--}}
                                        @endif
                                    </td>
                                     <td>
                                         <button class="btn btn-dark-gradient btn-block">
                                     <a   href="{{url('dashboard/answers_special_conditions/'.$x->id)}}" style="font-weight: bold; color: beige;">الشروط الخاصة</a>

                                         </button>
                                     </td>


                                    <td style="">
                                        @if ($x->status == 0)


                                                <a class="btn btn-danger-gradient btn-block"  href="contracts/add_price/{{$x->id}}"   style=" color: beige;"
                                                   data-id="{{ $x->id }}" data-name="{{ $x->user->name }}"
                                                   data-status="{{$x->status}}"
                                                >قيد المراجعة</a>

{{--                                            <button class="btn btn-danger-gradient btn-block">قيد المراجعة</button>--}}

                                        @elseif ($x->status == 1)
                                            <button class="btn btn-warning btn-block" style=" color: black;" > معتمد من قبل الادارة

                                            </button>
                                        @elseif($x->status == 2)

                                            <button class="btn btn-success-gradient btn-block">
                                                <a data-effect="effect-scale"  href="#modaldemo16" data-toggle="modal" style=" color: beige;"
                                                   data-id="{{ $x->id }}" data-name="{{ $x->user->name }}"
                                                   data-status="{{$x->status}}">
                                                    معتمد من قبل العميل
                                                </a>
                                            </button>
                                        @elseif($x->status == 3)

                                                <a class="btn btn-danger-gradient btn-block"  href="contracts/add_price/{{$x->id}}"   style=" color: beige;"
                                                   data-id="{{ $x->id }}" data-name="{{ $x->user->name }}"
                                                   data-review="{{ $x->reason_review }}"
                                                   data-status="{{$x->status}}">
                                               مراجعة
                                                </a>

                                        @elseif($x->status == 4)
                                            <button class="btn btn-danger btn-block">
                                                 مرفوض<i class="las la-frown"></i>
                                            </button>
                                        @elseif($x->status == 5)

                                            <button class="btn btn-success-gradient btn-block">
                                                <a data-effect="effect-scale"  href="#modaldemo15" data-toggle="modal" style=" color: beige;"
                                                   data-id="{{ $x->id }}" data-name="{{ $x->user->name }}"
                                                   data-status="{{$x->status}}">
                                                    معتمد نهائي
                                                </a>
                                            </button>
                                        @elseif($x->status == 6)
                                            <button class="btn btn-success btn-block">
                                                {{--                                                <a data-effect="effect-scale"  href="#exampleModal2" data-toggle="modal" style=" color: beige;"--}}
                                                {{--                                                   data-id="{{ $x->id }}" data-name="{{ $x->user->name }}"--}}
                                                {{--                                                   data-status="{{$x->status}}">--}}
                                                مكتمل<i class="las la-grin-beam"></i>
                                                {{--                                                </a>--}}
                                            </button>
                                        @endif
                                    </td>
                                    <td id="dynamic_field_{{$x->id}}" style="">
                                        @if ($x->viewing_status == 1)
                                            <div>
                                                <input type="button"
                                                       class="btn btn-success-gradient btn-block"
                                                       value='تمت المشاهدة ' >
                                            </div>
                                        @else
                                            <input type="button"
                                                   class="btn btn-danger-gradient btn-block update"
                                                   value='غير مشاهدة '
                                                   data-id='{{$x->id}}'
                                                   data-viewing_status="{{$x->viewing_status}}" >
                                        @endif
                                    </td>
{{--                                    <td>--}}
{{--                                        <button class="btn btn-info -gradient btn-block">--}}
{{--                                            <a   href="{{url('dashboard/notification/'.$x->id)}}" style="font-weight: bold; color: beige;">الاشعارت</a>--}}

{{--                                        </button>--}}
{{--                                    </td>--}}
                                    <td>

                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                       data-id="{{ $x->id }}"
                                       data-name="{{ $x->user->name }}"
                                       data-code= "  {{ !empty($x->code) ?  $x->code: 'لا يوجد بيانات'}}"
                                       data-project= "   {{ !empty($x->project->name) ?  $x->project->name : 'لا يوجد بيانات'}}"
                                       data-section= "    {{ !empty($x->section->name) ?  $x->section->name : 'لا يوجد بيانات'}}"
                                       data-construction_type= "  {{ !empty($x->construction_type) ?  $x->construction_type: 'لا يوجد بيانات'}}"
                                       data-id_card_number= "  {{ !empty($x->id_card_number) ?  $x->id_card_number: 'لا يوجد بيانات'}}"
                                       data-id_card_date= "  {{ !empty($x->id_card_date) ?  $x->id_card_date: 'لا يوجد بيانات'}}"
                                       data-status_card_issuer= "  {{ !empty($x->status_card_issuer) ?  $x->status_card_issuer: 'لا يوجد بيانات'}}"
                                       data-instrument_no= "  {{ !empty($x->Instrument_no) ?  $x->Instrument_no: 'لا يوجد بيانات'}}"
                                       data-instrument_date= "  {{ !empty($x->Instrument_date) ?  $x->Instrument_date: 'لا يوجد بيانات'}}"
                                       data-building_permit_number= "  {{ !empty($x->building_permit_number) ?  $x->building_permit_number: 'لا يوجد بيانات'}}"
                                       data-license_date= "  {{ !empty($x->license_date) ?  $x->license_date: 'لا يوجد بيانات'}}"
                                       data-engineering_office_name= "  {{ !empty($x->engineering_office_name) ?  $x->engineering_office_name: 'لا يوجد بيانات'}}"
                                       data-engineer_name= "  {{ !empty($x->engineer_name) ?  $x->engineer_name: 'لا يوجد بيانات'}}"
                                       data-engineer_phone_email= "  {{ !empty($x->engineer_phone_email) ?  $x->engineer_phone_email: 'لا يوجد بيانات'}}"
                                       data-price= "  {{ !empty($x->price) ?  $x->price: 'لا يوجد بيانات'}}"
                                       data-approval= "  {{ !empty($x->approval) ?  $x->approval: 'لا يوجد بيانات'}}"
                                       data-suggested_projects= "  {{ !empty($x->suggested_projects) ?  $x->suggested_projects: 'لا يوجد بيانات'}}"
                                       data-projects_details= "  {{ !empty($x->projects_details) ?  $x->projects_details: 'لا يوجد بيانات'}}"
                                       data-price_details= "  {{ !empty($x->price_details) ?  $x->price_details: 'لا يوجد بيانات'}}"
                                       data-final_contract= "  {{ !empty($x->final_contract) ?  $x->final_contract: 'لا يوجد بيانات'}}"

                                       data-status_card_image= "  {{url('/')."/".$x->status_card_image}}"
                                       data-instrument_image= "{{url('/')."/".$x->Instrument_image}}"
                                       data-license_image= "  {{url('/')."/".$x->license_image}}"
                                       data-website_image= "  {{url('/')."/".$x->website_image}}"

                                       data-starch_chart_image= "  {{url('dashboard/contracts/view_images')."/".$x->id}}"
                                       data-toggle="modal" href="#modaldemo9" title="عرض"><i
                                            class="icon ion-ios-eye"></i></a>
                                    {{--                                        @endcan--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{--add--}}
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('occupation.add_profession')}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                   type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('sections.store') }}" method="post"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">{{trans('occupation.name_arabe')}}</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">نوع المشروع :</label>

                                    <select name="project_id" id="select-beast" class="form-control form-control-md nice-select  custom-select">
{{--                                        @foreach ($Projects as $z)--}}
{{--                                        <option value="{{$z->id}}">{{$z->name}}</option>--}}

{{--                                        @endforeach--}}
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">حالة المشروع :</label>
                                    <select name="status" id="select-beast" class="form-control form-control-md nice-select  custom-select">
                                        <option value="1">{{trans('users_visitors.active')}}</option>
                                        <option value="0">{{trans('users_visitors.Inactive')}}</option>
                                    </select>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">{{trans('occupation.Submit')}}</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('occupation.Close')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Basic modal -->


        </div>
        <!-- edit -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">إضافة عرض سعر</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <form action="updatePrice" method="post" autocomplete="off" enctype="multipart/form-data">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="">
                            <div class="row">
                                <div class="form-group col-md-12">

                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>
                                        <p id="review"></p>
                                    </strong>

                                </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">السعر الاجمالي</label>
                                    <input type="text" class="form-control"  name="price">
                                </div>

                                <input type="hidden" class="form-control"  name="status" value="2">

                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">تفاصيل اخرى عن السعر :</label>
                                    <textarea class="form-control" placeholder="تفاصيل اخرى عن السعر(اختياري)" rows="3" spellcheck="false"  name="price_details"></textarea>
{{--                                    <input type="text" class="form-control"  name="price_details">--}}
                                </div>


                                      </div>




                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">{{trans('occupation.Submit')}}</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('occupation.Close')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">بيانات العقد</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                      type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="#" method="post">

                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="row">
                                <div class="form-group col-md-2">
                                    <h5>كود العقد:</h5>
                                    <p id ="code"></p>
                                </div>
                                <div class="form-group col-md-3">
                                    <h5>صاحب العقد:</h5>
                                    <p id ="name"></p>
                                </div>
                                <div class="form-group col-md-2">
                                    <h5>المشروع:</h5>
                                    <p id ="project"></p>
                                </div>
                                <div class="form-group col-md-2">
                                    <h5>القسم :</h5>
                                    <p id ="section"></p>
                                </div>
                                <div class="form-group col-md-3">
                                    <h5>نوع البناء :</h5>
                                    <p id ="construction_type"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5>رقم بطاقة الاحوال :</h5>
                                    <p id ="id_card_number"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5>تاريخ بطاقة الاحوال :</h5>
                                    <p id ="id_card_date"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5>مصدر بطاقة الاحوال :</h5>
                                    <p id ="status_card_issuer"></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5>رقم الصك:</h5>
                                    <p id ="Instrument_no"></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5>تاريخ الصك:</h5>
                                    <p id ="Instrument_date"></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5>رقم ترخيص البناء:</h5>
                                    <p id ="building_permit_number"></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5>تاريخ ترخيص البناء:</h5>
                                    <p id ="license_date"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5>اسم المكتب الهندسي:</h5>
                                    <p id ="engineering_office_name"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5>اسم المهندس :</h5>
                                    <p id ="engineer_name"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5>ايميل او موبايل المهندس:</h5>
                                    <p id ="engineer_phone_email"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5>سعر المشروع:</h5>
                                    <p id ="price"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5>تفاصيل السعر:</h5>
                                    <p id ="price_details"></p>
                                </div>
                                <div class="form-group col-md-4">
                                    <h5>حالة المخالصة:</h5>
                                    <p id ="approval"></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5>مشاريع مقترحة:</h5>
                                    <p id ="suggested_projects"></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <h5>تفاصيل المشروع:</h5>
                                    <p id ="projects_details"></p>
                                </div>

                                <div class="text-center col-md-3">
                                    <h5>صورة البطاقة:</h5>
                                <a href="" download="MyGroup" id="status_card_image_download" >
                                    <img  src="" id="status_card_image" alt="لا يوجد صورة" width="50" height="50">
                                </a>
                                </div>
                                <div class="text-center col-md-3">
                                    <h5>صورة الصك:</h5>
                                    <a href="" download="MyGroup" id="Instrument_image_download" >
                                        <img  src="" id="Instrument_image" alt="لا يوجد صورة" width="50" height="50">
                                    </a>
                                </div>
                                <div class="text-center col-md-3">
                                    <h5>صورة الترخيص:</h5>
                                    <a href="" download="MyGroup" id="license_image_download" >
                                        <img  src="" id="license_image" alt="لا يوجد صورة" width="50" height="50">
                                    </a>
                                </div>
                                <div class="text-center col-md-3">
                                    <h5>صورة الموقع:</h5>
                                    <a href="" download="MyGroup" id="website_image_download" >
                                        <img  src="" id="website_image" alt="لا يوجد صورة" width="50" height="50">
                                    </a>
                                </div>


                                <div class="text-center col-md-12" style=" margin-top: 20px;">
                                    <h5>صور المخطط الانشائي المعماري وتقارير التربة :</h5>
                                    <button class="btn btn-dark-gradient btn-block">
                                        <a   href="" style="font-weight: bold; color: beige; " id="starch_chart_image">عرض الصور</a>
                                    </button>
                                </div>

{{--                                <div class="text-center col-md-3">--}}
{{--                                    <h5>صورة بطاقة الاحوال :</h5>--}}
{{--                                    <a href="" download="MyGroup" id="status_card_image_download" >--}}
{{--                                        <img  src="" id="status_card_image" alt="MyGroup" width="50" height="50">--}}
{{--                                    </a>--}}
{{--                                </div>--}}


                            </div>


                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="modaldemo15">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">انتهاء حالة العقد</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                         type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="Completion_project" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}


                            <div class="modal-body">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>
                                        <p>هل انت متاكد من انهاء حالة العقد</p>
                                    </strong>
                                </div>

                                <input type="hidden" name="status"  value="6">
                                <input type="hidden" name="id" id="id" value="">

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">{{trans('occupation.Submit')}}</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('occupation.Close')}}</button>
                            </div>


                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="modaldemo16">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">انتهاء حالة العقد</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                              type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="Completion_project" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}


                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>
                                    <p>هل انت متاكد من اعتماد حالة العقد</p>
                                </strong>
                            </div>

                            <input type="hidden" name="status"  value="5">
                            <input type="hidden" name="id" id="id" value="">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">{{trans('occupation.Submit')}}</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('occupation.Close')}}</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>






    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var status = button.data('status')
            var type_project = button.data('type_project')
            var id_project = button.data('id_project')
            var review = button.data('review')




            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #type_project').val(id_project);
            modal.find('.modal-body #type_project').html(type_project);
            modal.find('.modal-body #review').html(review);

            if (status == 1) {
                modal.find('.modal-body #status').html("فعال");
            }else {
                modal.find('.modal-body #status').html("غير فعال");
            }


        })

    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var code = button.data('code')
            var project = button.data('project')
            var section = button.data('section')
            var construction_type = button.data('construction_type')
            var id_card_number = button.data('id_card_number')
            var id_card_date = button.data('id_card_date')
            var status_card_issuer = button.data('status_card_issuer')

            var Instrument_no = button.data('instrument_no')
            var Instrument_date = button.data('instrument_date')
            var building_permit_number = button.data('building_permit_number')
            var license_date = button.data('license_date')

            var engineering_office_name = button.data('engineering_office_name')
            var engineer_name = button.data('engineer_name')
            var engineer_phone_email = button.data('engineer_phone_email')

            var price = button.data('price')
            var price_details = button.data('price_details')
            var approval = button.data('approval')

            var suggested_projects = button.data('suggested_projects')
            var projects_details = button.data('projects_details')

            var status_card_image = button.data('status_card_image')
            var instrument_image = button.data('instrument_image')
            var license_image = button.data('license_image')
            var website_image = button.data('website_image')

            var starch_chart_image = button.data('starch_chart_image')


            var modal = $(this)
            modal.find('.modal-body #id').html(id);
            modal.find('.modal-body #name').html(name);
            modal.find('.modal-body #code').html(code);
            modal.find('.modal-body #project').html(project);
            modal.find('.modal-body #section').html(section);

            if (construction_type == 1) {
                modal.find('.modal-body #construction_type').html("البناء  بمواد");
            }else {
                modal.find('.modal-body #construction_type').html("البناء بدون مواد");
            }

            modal.find('.modal-body #id_card_number').html(id_card_number);
            modal.find('.modal-body #id_card_date').html(id_card_date);
            modal.find('.modal-body #status_card_issuer').html(status_card_issuer);

            modal.find('.modal-body #Instrument_no').html(Instrument_no);
            modal.find('.modal-body #Instrument_date').html(Instrument_date);
            modal.find('.modal-body #building_permit_number').html(building_permit_number);
            modal.find('.modal-body #license_date').html(license_date);

            modal.find('.modal-body #engineering_office_name').html(engineering_office_name);
            modal.find('.modal-body #engineer_name').html(engineer_name);
            modal.find('.modal-body #engineer_phone_email').html(engineer_phone_email);

            modal.find('.modal-body #price').html(price);
            modal.find('.modal-body #price_details').html(price_details);
            // modal.find('.modal-body #approval').html(approval);
            if (approval == 1) {
                modal.find('.modal-body #approval').html("تمت الموافقة");
            }else {
                modal.find('.modal-body #approval').html("لم تتم الموافقة");
            }

            modal.find('.modal-body #suggested_projects').html(suggested_projects);
            modal.find('.modal-body #projects_details').html(projects_details);
//image

            document.getElementById('status_card_image').src =  status_card_image;
            document.getElementById('Instrument_image').src =  instrument_image;
            document.getElementById('license_image').src =  license_image;
            document.getElementById('website_image').src =  website_image;
            document.getElementById('status_card_image_download').href =  status_card_image;
            document.getElementById('Instrument_image_download').href =  instrument_image;
            document.getElementById('license_image_download').href =  license_image;
            document.getElementById('website_image_download').href =  website_image;

            document.getElementById('starch_chart_image').href =  starch_chart_image;



        })

    </script>


    {{--                            data-final_contract= "  {{ !empty($x->final_contract) ?  $x->final_contract: 'لا يوجد بيانات'}}"--}}
    {{--                            data-website_image= "  {{ !empty($x->website_image) ?  $x->website_image: 'لا يوجد بيانات'}}"--}}
    <script>
        $('#modaldemo15').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);


        })

    </script>
    <script>
        $('#modaldemo16').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);


        })

    </script>
    <script>
        $(document).ready(function() {
            $('.update').on('click', function () {
                var edit_id = $(this).data('id');
                // var viewing_status = $(this).data('viewing_status');
                $.post('{{ route("updatecontracts") }}',
                    {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id : edit_id
                        ,viewing_status: "1"
                    },
                    function(data){
                        table_post_row(data);
                        console.log(data);
                    });
                function table_post_row(res){
                    var id ='#dynamic_field_'+res.id;
                    // alert(id);
                    let htmlView = '';
                    if(res.employees == 1){
                        htmlView+= `

           <input type="button" class="btn btn-success-gradient btn-block" value='تمت المشاهدة ' >
       `;
                    }

                    $(id).html(htmlView);
                }
            });
        });

    </script>
@endsection

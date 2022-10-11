@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

    <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">مرحبا بك!</h2>
                {{--						  <p class="mg-b-0">Sales monitoring dashboard template.</p>--}}
            </div>
        </div>

    </div>

    <!-- /breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-24 text-white">المستخدمين</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                        <h4 class="tx-20 font-weight-bold mb-1 text-white">{{Auth::user()->where('type',1)->count()}}</h4>
{{--                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>--}}
                            </div>

                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-24 text-white">العملاء</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                        <h4 class="tx-20 font-weight-bold mb-1 text-white">{{Auth::user()->where('type',3)->count()}}</h4>
{{--                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>--}}
                            </div>

                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-24 text-white">عقود اليوم</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$contract}}</h4>
{{--                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>--}}
                            </div>

                        </div>
                    </div>
                </div>
                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-24 text-white">اجمالي العقود المقدمة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{$contractcont}}</h4>
{{--                                <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>--}}
                            </div>

                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <h1>العقود</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table key-buttons text-md-nowrap" data-page-length='10'
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">كود العقد</th>
                                <th class="border-bottom-0">اسم صاحب العقد</th>
                                <th class="border-bottom-0">رقم بطاقة الاحوال </th>
                                <th class="border-bottom-0"> المشروع</th>
                                <th class="border-bottom-0">قسم المشروع</th>
                                <th class="border-bottom-0">نوع البناء</th>
                                <th class="border-bottom-0">ملحق الشروط الخاصة</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($contractall as $x)
                                <?php $i++; ?>
                                <tr>
                                    <th class="border-bottom-0">#</th>

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

                                            <button class="btn btn-success-gradient btn-block">البناء بمواد</button>

                                        @else
                                            <button class="btn btn-danger-gradient btn-block">البناء بدون مواد</button>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-dark-gradient btn-block">
                                            <a   href="{{url('dashboard/answers_special_conditions/'.$x->id)}}" style="font-weight: bold; color: beige;">الشروط الخاصة</a>

                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <h1>الرسائل</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='10'
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">رقم الموبايل</th>
                                <th class="border-bottom-0">البريد الالكتروني</th>
                                <th class="border-bottom-0">نص رسالة</th>


                            </tr>
                            </thead>
                            <tbody>
                                                                    <?php $i = 0; ?>
                                                                    @foreach ($Connect_us as $x)
                                                                        <?php $i++; ?>
                                                                        <tr>
                                                                            <td>{{ $i }}</td>
                                                                            <td>
                                                                                {{ !empty($x->phone) ?  $x->phone : 'لا يوجد بيانات'}}
                                                                            </td>

                                                                            <td>
                                                                                {{ !empty($x->email) ?  $x->email : 'لا يوجد بيانات'}}
                                                                            </td>
                                                                            <td>
                                                                                {{ !empty($x->content) ?  $x->content : 'لا يوجد بيانات'}}
                                                                            </td>



                            </tr>
                                                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{trans('services.delete_service')}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                             type="button"><span aria-hidden="true">&times;</span></button>
                </div>

                <form action="messages/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>
                                <p>{{trans('messages.delete_message2')}}</p>
                            </strong>

                        </div>

                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="services_name" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{trans('messages.Submit')}}</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('messages.Close')}}</button>
                    </div>


                </form>
            </div>
        </div>
    </div>

    </div>






    <!-- row closed -->

    <!-- row opened -->

    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')


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
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Moment js -->
    <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <!--Internal  Flot js-->
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
    <script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
    <script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
    <!--Internal Apexchart js-->
    <script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
    <!-- Internal Map -->
    <script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
    <!--Internal  index js -->
    <script src="{{URL::asset('assets/js/index.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>

    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal  Morris js -->
    <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/morris.js/morris.min.js')}}"></script>
    <!--Internal Chart Morris js -->
    <script src="{{URL::asset('assets/js/chart.morris.js')}}"></script>


    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var services_name = button.data('services_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #services_name').val(services_name);
        })

    </script>
@endsection

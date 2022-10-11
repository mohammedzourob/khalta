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
                الاعمال</span>
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

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('success') }}</strong>
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
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
{{--                                <th class="border-bottom-0">{{trans('occupation.Profession_name')}}</th>--}}
                                <th class="border-bottom-0">كود العقد</th>
                                <th class="border-bottom-0">اسم العميل</th>
                                <th class="border-bottom-0">صورة العمل</th>
                                <th class="border-bottom-0">اسم العمل</th>
                                <th class="border-bottom-0">تاريخ العمل</th>
                                <th class="border-bottom-0"> اسم المشرف</th>
                                <th class="border-bottom-0"> حالة العمل</th>

                                <th class="border-bottom-0"> حالة المششاهدة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($work as $x)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>

                                    <td>{{ $x->contract->code }}</td>
                                    <td>{{ $x->contract->user->name }}</td>
                                    <td>
                                        <button class="btn btn-dark-gradient btn-block">
                                            <a   href="{{url('dashboard/view_images/'.$x->id)}}" style="font-weight: bold; color: beige;">عرض الصور</a>
                                        </button>
                                    </td>
{{--                                    <td><img src="{{url('').$x->image}}"></td>--}}


                                    <td>{{ $x->name }}</td>

                                    <td style="">
                                        {{ $x->date }}
                                    </td>

                                    <td style="">
                                        {{ $x->publisher }}
                                    </td>

                                    <td style="">
                                        @if ($x->status == 1)

                                            {{--                                            <button class="btn btn-success-gradient btn-block">فعال</button>--}}
                                            <a class="modal-effect btn btn-success-gradient btn-block" data-effect="effect-scale"
                                               data-id="{{ $x->id }}" data-name="{{ $x->name }}"
                                               data-status="{{ $x->status }}"
                                               data-type_project="{{$x->name}}"
                                               data-id_project="{{$x->id}}"
                                               data-description="" data-toggle="modal"
                                               href="#exampleModal2" title="تعديل"> فعال
                                                @else
                                                    <a class="modal-effect btn btn-danger-gradient btn-block" data-effect="effect-scale"
                                                       data-id="{{ $x->id }}"
                                                       data-status="{{ $x->status }}"
                                                       data-type_project="{{$x->name}}"
                                                       data-id_project="{{$x->id}}"
                                                       data-description="" data-toggle="modal"
                                                       href="#exampleModal2" title="تعديل">غير فعال
                                        @endif
                                    </td>
                                    <td id="dynamic_field_{{$x->id}}" style="">
                                        @if ($x->viewing_status == 1)
                                            <div>
                                                <input type="button"
                                                       class="btn btn-success-gradient btn-block"
                                                       value='تمت مشاهدة ' >
                                            </div>
                                        @else
                                            <input type="button"
                                                   class="btn btn-danger-gradient btn-block update"
                                                   value='غير مشاهدة '
                                                   data-id='{{$x->id}}'
                                                   data-viewing_status="{{$x->viewing_status}}" >
                                        @endif
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
                        <h5 class="modal-title" id="exampleModalLabel">تعديل حالة العمل</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="updatestatuswork" method="post" autocomplete="off" enctype="multipart/form-data">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="">
                            <div class="row">



                                <input type="hidden" name="viewing_status" value="1">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">حالة المشروع :</label>

                                    <select data-toggle="dropdown" class="btn form-control btn-block " name="status">
                                        <option id="status" ></option>
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
        </div>
        <!-- delete -->
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('occupation.delete_profession')}}</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                      type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="sections/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>
{{--                                    <p>{{trans('occupation.delete_message1')}}</p>--}}
                                    <p>{{trans('occupation.delete_message2')}}</p>

                                </strong>

                            </div>


                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="name" id="name" type="text" readonly>
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




            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #type_project').val(id_project);
            modal.find('.modal-body #type_project').html(type_project);

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

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })

    </script>
    <script>
        $(document).ready(function() {
            $('.update').on('click', function () {
                var edit_id = $(this).data('id');
                // var viewing_status = $(this).data('viewing_status');
                // alert(edit_id);
                $.post('{{ route("updatework") }}',
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

           <input type="button" class="btn btn-success-gradient btn-block" value='تمت مشاهدة ' >
       `;
                    }

                    $(id).html(htmlView);
                }
            });
        });

    </script>
@endsection

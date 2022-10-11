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

@endsection

<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('occupation.Settings')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                حالات المخالصة</span>
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
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='10'
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
{{--                                <th class="border-bottom-0">{{trans('occupation.Profession_name')}}</th>--}}
                                <th class="border-bottom-0">كود العقد</th>
                                <th class="border-bottom-0">اسم العميل</th>
                                <th class="border-bottom-0"> حالة المخالصة</th>
                                <th class="border-bottom-0"> حالة الموافقة </th>
                                <th class="border-bottom-0"> حالة المشاهدة</th>
{{--                                <th class="border-bottom-0">{{trans('occupation.Processes')}}</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($clearance as $x)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>

                                    <td>{{ $x->code }}</td>
                                    <td>{{ $x->user->name }}</td>



                                    <td style="">
                                        @if ($x->approval == 1)

{{--                                            <button class="btn btn-success-gradient btn-block">فعال</button>--}}
                                            <a class="modal-effect btn btn-success-gradient btn-block" data-effect="effect-scale"
                                               data-id="{{ $x->id }}" data-name="{{ $x->name }}"
                                                 data-status="{{ $x->status }}"
                                               data-type_project="{{$x->name}}"
                                               data-id_project="{{$x->id}}"
                                               data-description="" data-toggle="modal"
                                               href="#" title="تعديل"> تمت الموافقة
                                                @else
                                                    <a class="modal-effect btn btn-danger-gradient btn-block" data-effect="effect-scale"
                                                       data-id="{{ $x->id }}"
                                                       data-status="{{ $x->status }}"
                                                       data-type_project="{{$x->name}}"
                                                       data-id_project="{{$x->id}}"
                                                       data-description="" data-toggle="modal"
                                                       href="#" title="تعديل">لم تتم الموافقة
                                        @endif
                                    </td>
                                    <td style="">
                                        @if ($x->clearance_status_admin == 1)

                                            {{--                                            <button class="btn btn-success-gradient btn-block">فعال</button>--}}
                                            <a class="modal-effect btn btn-success-gradient btn-block" data-effect="effect-scale"
                                               data-id="{{ $x->id }}" data-name="{{ $x->name }}"
                                               data-clearance_status_admin="{{ $x->clearance_status_admin }}"
                                               data-type_project="{{$x->name}}"
                                               data-id_project="{{$x->id}}"

                                               data-description="" data-toggle="modal"
                                               href="#exampleModal2" title="تعديل"> نشر
                                                @else
                                                    <a class="modal-effect btn btn-danger-gradient btn-block" data-effect="effect-scale"
                                                       data-id="{{ $x->id }}"
                                                       data-clearance_status_admin="{{ $x->clearance_status_admin }}"
                                                       data-type_project="{{$x->name}}"
                                                       data-id_project="{{$x->id}}"
                                                       data-description="" data-toggle="modal"
                                                       href="#exampleModal2" title="تعديل">عدم النشر
                                        @endif
                                    </td>
                                    <td id="dynamic_field_{{$x->id}}" style="">
                                        @if ($x->Clearance_viewing_status == 1)
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
                                                   data-viewing_status="{{$x->Clearance_viewing_status}}" >
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
                        <h5 class="modal-title" id="exampleModalLabel">تعديل حالة المخالصة</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="updatestatusclearance" method="post" autocomplete="off" enctype="multipart/form-data">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="id" id="id" value="">
                            <div class="row">



                                <input type="hidden" name="viewing_status" value="1">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputEmail1">حالة النشر :</label>

                                    <select data-toggle="dropdown" class="btn form-control btn-block " name="clearance_status_admin">
                                        <option id="status" ></option>
                                        <option value="1">نشر</option>
                                        <option value="0">عدم النشر</option>
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
                        <h6 class="modal-title">عرض الصورة</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                                                      type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                <div class="text-center col-md-12">
                                <img  src="{{url('')}}" id="image">
                                </div>
                             </div>
                            </div>
                        </div>




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
            var clearance_status_admin = button.data('clearance_status_admin')





            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #status').val(clearance_status_admin);


            if (clearance_status_admin == 1) {
                modal.find('.modal-body #status').html("نشر");
            }else {
                modal.find('.modal-body #status').html("عدم النشر");
            }


        })

    </script>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
            </script>
    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var image = button.data('image')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);

            document.getElementById('image').src =  image;
        })

    </script>
    <script>
        $(document).ready(function() {
        $('.update').on('click', function () {
            var edit_id = $(this).data('id');
            // var viewing_status = $(this).data('viewing_status');
            $.post('{{ route("updateclearance_cases") }}',
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                        id : edit_id
                        ,Clearance_viewing_status: "1"
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

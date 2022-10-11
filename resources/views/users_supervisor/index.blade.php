@extends('layouts.master')
@section('css')

@section('title')
    المستخدمين
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('users_visitors.users')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المشرفين</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif( session('delete') )
        <div class="alert alert-danger ">
            {{ session('delete') }}
        </div>
    @endif


    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row row-xs wd-xl-80p">
                        <div class="col-sm-6 col-md-3 mg-t-10">
                            <button class="btn btn-info-gradient btn-block">
                                <a href="{{ route('user_supervisor.create')}}" style="font-weight: bold; color: beige;">{{trans('users_admin.add_users')}}</a>
                            </button>

                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                            <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('users_visitors.users_name')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('users_visitors.users_email')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('users_visitors.user_status')}}</th>
{{--                                <th class="wd-15p border-bottom-0">نوع المستخدم</th>--}}
                                <th class="wd-10p border-bottom-0">{{trans('users_visitors.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($data as $key => $user)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                               <td style="">
                                                   @if ($user->Status == 1)

                                                       <button class="btn btn-success-gradient btn-block">فعال</button>

                                                   @else
                                                       <button class="btn btn-danger-gradient btn-block">غير فعال</button>

                                                   @endif
                                                 </td>

{{--                                                                        <td>--}}
{{--                                                                            @if (!empty($user->getRoleNames()))--}}
{{--                                                                                @foreach ($user->getRoleNames() as $v)--}}
{{--                                                                                    <label class="badge badge-success">{{ $v }}</label>--}}
{{--                                                                                @endforeach--}}
{{--                                                                            @endif--}}
{{--                                                                        </td>--}}

                                    <td>

                                            <a href="{{ route('user_supervisor.edit', $user->id) }}" class="btn btn-sm btn-info"
                                               title="تعديل"><i class="las la-pen"></i></a>



{{--                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"--}}
{{--                                               data-user_id="{{ $user->id }}" data-username="{{ $user->name }}"--}}
{{--                                               data-toggle="modal" href="#modaldemo8" title="حذف"><i--}}
{{--                                                    class="las la-trash"></i></a>--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        <!-- Modal effects -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">{{trans('users_visitors.delete_users')}}</h6><button aria-label="Close" class="close"
                                                                         data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="user_supervisor/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>{{trans('users_visitors.delete_message2')}}</p><br>
                            <input type="hidden" name="id" id="user_id" value="">
                            <input class="form-control" name="username" id="username" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('users_visitors.Close')}}</button>
                            <button type="submit" class="btn btn-danger">{{trans('users_visitors.Submit')}}</button>
                        </div>

                </form>
            </div>
        </div>
    </div>

    </div>
    <!-- /row -->
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
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script>
        $('#modaldemo8').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var user_id = button.data('user_id')
            var username = button.data('username')
            var modal = $(this)
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #username').val(username);
        })

    </script>


@endsection

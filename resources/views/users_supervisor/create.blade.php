@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
اضافة مستخدم - مورا سوفت للادارة القانونية
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> {{trans('users_visitors.users')}} </h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0"> / {{trans('users_visitors.admin_users')}}</span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0"> / {{trans('users_visitors.add_users')}}</span>
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
                    action="{{route('user_supervisor.store')}}" method="post">

                    {{csrf_field()}}
                    <input type="hidden" name="type" value="2">
                    <div class="">
                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label>{{trans('users_visitors.users_name')}} : <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-md mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="name" required="" type="text">
                            </div>

                            <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>{{trans('users_visitors.email')}} : <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="email" required="" type="email">
                            </div>
                        </div>
                    </div>

                    <div class="row mg-b-20">
                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label>{{trans('users_visitors.password')}} : <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="password" required="" type="password">
                        </div>

                        <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> {{trans('users_visitors.password_confirmation')}} : <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-md mg-b-20" data-parsley-class-handler="#lnWrapper"
                                name="password_confirmation" required="" type="password" >
                        </div>
                    </div>

                    <div class="row row-sm mg-b-20">
                        <div class="col-lg-6">
                            <label>{{trans('users_professionals.user_picture')}} : <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="image"  type="file">
                        </div>
                        <div class="col-lg-6">
                            <label>{{trans('users_professionals.mobile_number')}} : <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="phone"  type="number">

                        </div>
                    </div>
                        <div class="row row-sm mg-b-20">
                        <div class="col-lg-6">
                            <label>{{trans('users_professionals.City')}} : <span class="tx-danger">*</span></label>
                            <input class="form-control form-control-md mg-b-20"
                                   data-parsley-class-handler="#lnWrapper" name="City"  type="text">
                        </div>
                        <div class="col-lg-6">
                            <label> {{trans('users_visitors.user_status')}} : <span class="tx-danger">*</span></label>
                            <select name="Status" id="select-beast" class="form-control form-control-md nice-select  custom-select">
                                <option value="1">{{trans('users_visitors.active')}}</option>
                                <option value="0">{{trans('users_visitors.Inactive')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{trans('users_visitors.Submit')}}</button>

                            <a class="btn btn-secondary" data-effect="effect-scale" style="font-weight: bold; color: beige;"  href="{{ route('user_supervisor.index') }}">{{trans('users_visitors.Close')}}</a>

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

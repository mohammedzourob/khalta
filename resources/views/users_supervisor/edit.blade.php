@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('public/assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
 - مورا سوفت للادارة القانونية
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto"> {{trans('users_visitors.users')}} </h4>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0"> / المشرفين</span>
            <span class="text-muted mt-1 tx-13 mr-2 mb-0"> / {{trans('users_visitors.users_modification')}}</span>
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
{{--                <div class="col-lg-12 margin-tb">--}}
{{--                    <div class="pull-right">--}}
{{--                        <a class="btn btn-primary btn-sm" href="{{ route('users_admin.index') }}">رجوع</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <br>

                {!! Form::model($user, ['method' => 'PATCH','route' => ['user_supervisor.update', $user->id]]) !!}




                <div class="row mg-b-20">
                    <div class="parsley-input col-md-6" id="fnWrapper">
                        <label>{{trans('users_admin.users_name')}} : <span class="tx-danger">*</span></label>
                        {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                    </div>

                    <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                        <label>{{trans('users_admin.email')}} : <span class="tx-danger">*</span></label>
                        {!! Form::text('email', null, array('class' => 'form-control','required')) !!}
                    </div>
                </div>

                <div class="row row-sm mg-b-20">
                    <div class="col-lg-6">
                        <label> {{trans('users_visitors.user_status')}} : <span class="tx-danger">*</span></label>
                        <select name="Status" id="select-beast" class="form-control  nice-select  custom-select">
                            <option value="1">{{trans('users_visitors.active')}}</option>
                            <option value="0">{{trans('users_visitors.Inactive')}}</option>
                        </select>
                    </div>
                </div>


                <div class="mg-t-30">
                    <button class="btn btn-main-primary pd-x-20" type="submit">{{trans('users_visitors.Submit')}}</button>
                    <a class="btn btn-secondary" data-effect="effect-scale" style="font-weight: bold; color: beige;"  href="{{ route('user_supervisor.index') }}">{{trans('users_visitors.Close')}}</a>

                </div>
                {!! Form::close() !!}
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

<!-- Internal Nice-select js-->
<script src="{{URL::asset('public/assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('public/assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('public/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('public/assets/js/form-validation.js')}}"></script>
@endsection

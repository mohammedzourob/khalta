@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
    - مورا سوفت للادارة القانونية
@stop


@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                مستخدم</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')



<div class="row">
    <div class="col-lg-12 col-md-12">
    <div class="card">
        <div class="card-body">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label style="font-weight: bold">الاسم :</label>
            {{ $user->name }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label style="font-weight: bold">الايميل :</label>
            {{ $user->email }}
        </div>
    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label style="font-weight: bold">الحالة :</label>
                    {{ $user->Status}}
                </div>
                <div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
{{--            </div>--}}
{{--    <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--        <div class="form-group">--}}
{{--            <strong>Roles:</strong>--}}
{{--            @if(!empty($user->getRoleNames()))--}}
{{--            @foreach($user->getRoleNames() as $v)--}}
{{--            <label class="badge badge-success">{{ $v }}</label>--}}
{{--            @endforeach--}}
{{--            @endif--}}
{{--        </div>--}}
    </div>
</div>
    </div></div></div>

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

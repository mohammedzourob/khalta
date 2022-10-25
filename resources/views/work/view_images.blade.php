@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('public/assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />

<style>
    * {
        box-sizing: border-box;
    }

    .column {
        float: left;
        width: 33.33%;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
@section('title')

@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> الاعدادات </h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0"> / الاعمال</span>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0"> / صور العمل</span>
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
                <data class="row">
                @foreach($work as $x)
                    <div class="column">
                <img src="{{url("/")."/".$x->image}} "alt="..." style="width:100% ">
                    </div>
                @endforeach
                </data>
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
<script>
    import Data from "../../../public/assets/plugins/jquery-ui/ui/data";
    export default {
        components: {Data}
    }
</script>
<script src="{{URL::asset('public/assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('public/assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('public/assets/js/form-validation.js')}}"></script>
@endsection

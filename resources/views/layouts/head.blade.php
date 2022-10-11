<!-- Title -->
<title>Dashboard DataBook </title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
{{--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">--}}
{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

<script src="{{url('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
<!-- Sidemenu css -->
{{--<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">--}}
{{--@if (App::getLocale() == 'en')--}}
{{--    <link href="{{URL::asset('assets/css/skin-modes.css')}}" rel="stylesheet">--}}
{{--@else--}}
    <link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">
{{--@endif--}}
@yield('css')

{{--@if (App::getLocale() == 'en')--}}
{{--    <link rel="stylesheet" href="{{URL::asset('assets/css/sidemenu.css')}}">--}}
{{--    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">--}}

{{--    <link href="{{URL::asset('assets/css/style-dark.css')}}" rel="stylesheet">--}}
{{--@else--}}
<!--- Style css -->
<link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet">

{{--@endif--}}



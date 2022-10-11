<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>

        body {
            margin: 0 auto;
            direction: rtl;

        }
        * {

            direction: rtl;
        }

        /* Start Container Style */
        .container,.container-fluid,.container-lg,.container-md,.container-sm,.container-xl,.container-xxl{
            width:100%;
            padding-left:var(--bs-gutter-x,.75rem);
            padding-right:var(--bs-gutter-x,.75rem);
            margin-left:auto;
            margin-right:auto
        }
        @media (min-width:576px){
            .container,.container-sm{max-width:540px}
        }
        @media (min-width:768px){
            .container,.container-md,.container-sm{max-width:720px}
        }
        @media (min-width:992px){
            .container,.container-lg,.container-md,.container-sm{max-width:960px}
        }
        @media (min-width:1200px){
            .container,.container-lg,.container-md,.container-sm,.container-xl{max-width:1140px}
        }
        @media (min-width:1400px){
            .container,.container-lg,.container-md,.container-sm,.container-xl,.container-xxl{max-width:1320px}
        }
        /* End Container Style */

        /* Start Header and Footer Style */
        header, footer {
            text-align: center;
        }

        .img_header, .img_footer {
            width: 720px;
            height: 100px;
        }
        /* End Header and Footer Style */

        /* Start Content Style */
        h1 {
            color: #F00;
            /* font-family:"Times New Roman", serif;  */
            font-family: 'Tajawal', sans-serif;
            font-size: 14pt;
            text-align: center;
        }

        h2 {
            color: #001F5F;
            font-family: 'Tajawal', sans-serif;
            font-size: 14pt;
            text-align: right;
        }

        p, li {
            color: black;
            font-family: 'Tajawal', sans-serif;
            font-size: 12pt;
            text-align: right;
            /* padding-top: 4pt;
            margin:0pt;  */
        }

        ol {
            padding-inline-start: 15px;
        }

        span {
            color: red;
        }

        .s3 {
            color: #F00;
            font-family:"Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        .s4 {
            color: black;
            font-family:"Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
            vertical-align: 3pt;
        }

        .s5 {
            color: #F00;
            font-family:"Times New Roman", serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
            vertical-align: 3pt;
        }

        .s6 {
            color: black;
            font-family:Symbol, serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        .s8 {
            color: #0D0D0D;
            font-family:Symbol, serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }



    </style>
    <title>Document</title>
</head>

<body class="container">
<!-- Start Header -->
<header>
{{--    <img class="img_header" src="{{url("images/header.jpg")}}" alt="image" >--}}
</header>
<!-- End Header -->

<!-- Start Content -->
<h1>عقد مصنعية اللياسة</h1>
<h2>أولاً/ وثيقة العقد الأساسية</h2>
<p>الحمد لله رب العالمين والصلاة والسلام على نبيه محمد صلى الله عليه وسلم.</p>
<p>إنه في يوم ..................... تم الإتفاق في مدينة ..................... بين كل من:</p>
<ol>
    <li>السيد/ {{$p->user->name}} بطاقة رقم {{$p->id_card_number}} مصدرها{{$p->status_card_issuer}} تاريخها {{$p->id_card_date}} وهو المالك للأرض
        ذات الصك رقم ..................... في تاريخ..................... الواقعة بحي ..................... ويسمى المالك (الطرف الأول).</li>
    <li>مؤسسة/شركة <span>"خلطه للمقاولات العامة"</span> الرمز البريدي<span>55425</span> هاتف رقم <span>0505691213</span> والتي يمثلهاالسيد/ <span>مقبل بن مفرح مقبل العنزي </span><br>بموجب وكالة رقم <span>433375194</span>في تاريخ <span>14/7/1443ه </span>ويسمى المقاول (الطرف الثاني) وهما بكامل
        أهليتهما الشرعية على ما يلي:</li>
</ol>

<!-- End Content -->

<!-- Start Footer -->
<footer>
{{--    <img class="img_footer" src="images/footer.jpg" alt="image">--}}
</footer>
<!-- End Footer -->
</body>
<body class="container">
<!-- Start Header -->
<header>
    {{--    <img class="img_header" src="{{url("images/header.jpg")}}" alt="image" >--}}
</header>
<!-- End Header -->

<!-- Start Content -->
<div style="" id="page1">
    First Page Contents
</div>

<div style="display:none" id="page2">
    Second Page Contents
</div>
<h1>عقد مصنعية اللياسة</h1>
<h2>أولاً/ وثيقة العقد الأساسية</h2>
<p>الحمد لله رب العالمين والصلاة والسلام على نبيه محمد صلى الله عليه وسلم.</p>
<p>إنه في يوم ..................... تم الإتفاق في مدينة ..................... بين كل من:</p>
<ol>
    <li>السيد/ {{$p->user->name}} بطاقة رقم {{$p->id_card_number}} مصدرها{{$p->status_card_issuer}} تاريخها {{$p->id_card_date}} وهو المالك للأرض
        ذات الصك رقم ..................... في تاريخ..................... الواقعة بحي ..................... ويسمى المالك (الطرف الأول).</li>
    <li>مؤسسة/شركة <span>"خلطه للمقاولات العامة"</span> الرمز البريدي<span>55425</span> هاتف رقم <span>0505691213</span> والتي يمثلهاالسيد/ <span>مقبل بن مفرح مقبل العنزي </span><br>بموجب وكالة رقم <span>433375194</span>في تاريخ <span>14/7/1443ه </span>ويسمى المقاول (الطرف الثاني) وهما بكامل
        أهليتهما الشرعية على ما يلي:</li>
</ol>

<!-- End Content -->

<!-- Start Footer -->
<footer>
    {{--    <img class="img_footer" src="images/footer.jpg" alt="image">--}}
</footer>
<!-- End Footer -->
</body>

</html>

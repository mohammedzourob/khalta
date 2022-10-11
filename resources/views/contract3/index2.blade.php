<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
      <style>
          body {
              direction: rtl;
              font-weight: 900;
          }

          .c-red{
              color: red;
          }

          .c-blue{
              color: #080652;
          }

          .logo{
              width: 110%;
              margin: 0 auto;
              display: flex;
              /*height: 120px;*/
          }
          /*p{*/
          /*    margin-bottom: 0;*/
          /*}*/
          .fs-5{
              font-size: 14.5px !important;
          }
          .page-height{
              max-height: 300px;
          }
          .footer{
              width: 110%;
              /*margin: 0 auto;*/
              display: flex;
              /*height: 190px;*/
          }
          /*.page4 .fs-5{*/
          /*    margin-bottom: 8px;*/
          /*}*/
          /*.page5 .fs-5{*/
          /*    margin-bottom: 17px;*/
          /*}*/
          /*.page6 p{*/
          /*    margin-bottom: 500px;*/
          /*}*/
          /*.page4 .fs-5{*/
          /*    margin-bottom: 8px;*/
          /*}*/

      </style>
    <title>Contract</title>
  </head>
  <body>
  <div class="page-height">
  <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />

{{--1--}}

      <div class="container">
          <h4 class="c-red text-center my-3 fw-bold">
              عقد مصنعية العظم (بمواد)
          </h4>

          <p class="fw-bold fs-4 c-blue">أولاً/ وثيقة العقد الأساسية</p>
          <p class="fw-normal fs-5">
              الحمد لله رب العالمين والصلاة والسلام على نبيه محمد صلى الله عليه وسلم.
          </p>
          <p class="fw-normal fs-5">
              إنه في يوم {{$pdf->created_at->format('Y-m-d')}} تم الإتفاق في مدينة ............... بين
              كل من :
          </p>
          <p class="fw-normal fs-5">
              1- السيد/{{$pdf->user->name}} بطاقة رقم {{$pdf->id_card_number}}
              مصدرها {{$pdf->status_card_issuer}} تاريخها {{$pdf->id_card_date}} وهو مالك
              الأرض ذات الصك رقم {{$pdf->Instrument_no}} في تاريخ
              {{$pdf->Instrument_date}} الواقعة بحي ..................... ويسمى
              المالك ( الطرف الأول ).
          </p>

          <p class="fw-normal fs-5">
              2- مؤسسة/شركة <span class="c-red">"خلطه للمقاولات العامة" </span> الرمز
              البريدي <span class="c-red">55425</span> رقم الهاتف
              <span class="c-red">0505691213</span> والتي يمثلها السيد/
              <span class="c-red"> مقبل بن مفرح مقبل العنزي </span>

              بموجب وكالة رقم <span>433375194</span> في تاريخ
              <span>4/7/1443 هـ</span> ويسمى المقاول ( الطرف الثاني ) وهما بكامل
              أهليتهما الشرعية على ما يلي/
          </p>
          <p class="fw-normal fs-5">
              حصل الطرف الأول على ترخيص رقم {{$pdf->building_permit_number}} في تاريخ {{$pdf->license_date}}
              .لإقامة المشروع على قطعة الأرض المشار إليها أعلاه ويرغب في تكليف مقاول
              لأعمال ( مصنعية اللياسة )
          </p>

          <p class="fw-normal fs-5">
              يقر الطرف الثاني بدراسة جميع الأعمال المطلوبة على ضوء موقع المشروع
              والظروف المحيطة به طبقاً للمواصفات وحسب ما ورد في مستند هذا العقد، وعليه
              يتعهد بالقيام بجميع هذه المهام وفقاً
          </p>
          <p class="fw-bold fs-5">للبنود التالية: -</p>
          <div>
              <p class="fw-normal fs-5">
                  1- يعتبر ما ورد أعلاه جزء لا يتجزأ من العقد.
              </p>
              <p class="fw-normal fs-5">
                  2- تكون مهام عمل الطرف الثاني مصنعية كل ما يتعلة بالعظم والمباني
                  لعناصر الهيكل الإنشائي وهي كالآتي: (صبة النظافة، القواعد، الرقاب،
                  الميد، الأعمدة، الجدران الاستنادية، الأقبية، الأسقف ، الملاحق ،
                  السترة، الأسوار مع البوابات، صبة أرضية الدور الأرضي، الدرج مع بيته
                  العلو ، الدرج الخارجي، الخزانات، البيارة، الأعتاب، المباني المعزولة
                  وغير المعزولة وحوائط ع حماية العزل، أعمال المسبح الإنشائية، الجسور
                  المقلوبة بارتفاع 30 سم).
              </p>
              <p class="fw-normal fs-5">
                  3- على الطرف الثاني أن يلتزم بإحضار العمالة ذات الخبرة في تنفيذ جميع
                  الأعمال التي وردت أعلاه، وعليه فإن مسؤوليتهم النظامية تقع على الطرف
                  الثاني.
              </p>
              <p class="fw-normal fs-5">
                  4- يتعهد بأن ينفذ جميع الأعمال حسب المواصفات الواردة وحسب الكود
                  السعودي.
              </p>
              <p class="fw-normal fs-5">
                  5- في حال مخالفة الطرف الثاني لما جاء في البند السابق فعلى الطرف
                  الثاني أن يقوم بإزالة الأعمال المخالفة على حسابه الشخصي.
              </p>
              <p class="fw-normal fs-5 mb-2">
                  6- يلتزم الطرف الثاني بضمان أعماله التي قام بها لمدة
                  <span class="c-red">{{$pdf->Work_guarantee_period}} شهر</span> من تاريخ تسليم الأعمال للطرف
                  الأول.
              </p>
          </div>
      </div>

  <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" style="margin-top:20px ; " />
  </div>

  <div class="page-height">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" style="margin-bottom: 10px;" />

      {{--2--}}
      <div class="container">

          <p class="fw-normal fs-5 mb-2">
              7- يلتزم الطرف الثاني بإنهاء جميع الأعمال وتسليم المشروع في مدة أقصاها
              <span class="c-red">{{$pdf->duration_project}} شهر</span> من تاريخ توقيع العقد.
          </p>

          <p class="fw-normal fs-5">
              8- هذا العقد خاضع لأنظمة (المملكة العربية السعودية) وفي حال وجود خلاف
              لما ورد يقع تحت طائلة المسؤولية القانونية.
          </p>
          <p class="fw-normal fs-5">
              9- على الطرف الأول أن يلتزم بدفع أتعاب الطرف الثاني حسب ما هو متفق
              عليه في موعدها، وفي حال كان هناك تأخير لمدة أقصاها
              <span class="c-red">15 يوماً</span> يحق للطرف الثاني التوقف عن العمل
              بعد إشعار الطرف الأول بذلك قبل <span class="c-red">5 أيام</span> من
              التوقف.
          </p>

          <p class="fw-normal fs-5">
              10- يلتزم الطرف الأول بما يلي:
          </p>



          <ul class="fw-normal fs-5">
              <li>
                  تزويد الطرف الثاني بنسخة من المخططات.
              </li>
              <li> التراخيص اللازمة للبناء ومراجعة الدوائر الحكومية إذا لزم الأمر.</li>
              <li>الكهرباء المؤقتة للموقع.</li>
              <li> تكاليف المياه للموقع. </li>
              <li>دفع قيمة جميع مواد البناء الموردة للمشروع ماعدا ما تم الإتفاق على خالفه في هذا العقد. </li>


          </ul>
          <p class="fw-normal fs-5"> 11- لا يحق للطرف الأول القيام بأي تعديل بعد بدء الطرف الثاني بتنفيذ الأعمال المطلوبة، وفي حال
              كان هناك تعديلات تكون على حساب الطرف الأول. </p>
          <p class="fw-bold fs-5">12- الأتعاب:</p>

          <ul class="fw-normal fs-5">
              <li>سعر المتر المربع للسقف أو الملاحق العلوية أو بيت الدرج  <span class="c-red">{{$pdf->price1}} ريال
                    سعودي.</span> ، شاملاً الدرج وصبة
                  الدور الأرضي وكافة الجسور المقلوبة.</li>
              <li>سعر المتر الطولي للسور بما فيه البوابات <span class="c-red"> {{$pdf->price2}} ريال سعودي.</span></li>
              <li>سعر المتر الطولي للسترة  <span class="c-red"> {{$pdf->price3}} ريال سعودي.</span></li>
              <li>سعر المتر المربع للخزان الأرضي أو القبو <span class="c-red"> {{$pdf->price4}} ريال سعودي.</span></li>
              <li>سعر المتر المربع للبياره <span class="c-red"> {{$pdf->price5}} ريال سعودي.</span></li>
          </ul>

          <p class="fw-bold fs-5">13- الدفعات:</p>

          <p class="fw-normal fs-5">


              تم تقدير إجمالي أتعاب الطرف الثاني حسب األسعار الواردة أعاله بموجب المخططات بمبلغ وقدره <span class="c-red">
                 {{$pdf->price}} ريال سعودي</span>، وذلك حسب النسب ادناه:

          </p>

          <ul class="fw-normal fs-5">
              <li>
                  دفعة <span class="c-red"> {{$pdf->paying1}} %</span> بعد <span
                      class="c-red">عند توقيع هذا العقد.</span>
              </li>

              <li>
                  دفعة <span class="c-red"> {{$pdf->paying2}} %</span> بعد <span
                      class="c-red">{{$pdf->payment_content2}}</span>
              </li>
              <li>
                  دفعة <span class="c-red"> {{$pdf->paying3}} %</span> بعد <span
                      class="c-red">{{$pdf->payment_content3}}</span>
              </li>
              <li>
                  دفعة <span class="c-red"> {{$pdf->paying4}} %</span> بعد <span
                      class="c-red">{{$pdf->payment_content4}}</span>
              </li>

          </ul>
      </div>

      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" style="margin-top: 20px;" />
  </div>

  <div class="page-height">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" style="margin-bottom: 10px;" />

      {{--3--}}
      <div class="container">
          <ul class="fw-normal fs-5">
              <li>
                  دفعة <span class="c-red"> {{$pdf->paying5}} %</span> بعد <span
                      class="c-red">{{$pdf->payment_content5}}</span>
              </li>
              <li>
                  دفعة <span class="c-red"> {{$pdf->paying6}} %</span> بعد <span
                      class="c-red">{{$pdf->payment_content6}}</span>
              </li>
              <li>
                  دفعة <span class="c-red"> {{$pdf->paying7}} %</span> بعد <span
                      class="c-red">{{$pdf->payment_content7}}</span>
              </li>
          </ul>
          <p class="fw-bold fs-4">14- القياس والتمتير:</p>
          <p class="fw-normal fs-5">المعتمد في صافي أتعاب الطرف الثاني هو القياس على الطبيعة في نهاية العقد مع اعتبار ما
              يلي:</p>
          <ul>
              <p class="fw-normal fs-5">أ- البرولات والكرانيش إلى 10 سم لا تحسب من ضمن المتر، وفي حال زاد عن 10 سم تحسب
                  للطرف الثاني من ضمن المتر بمعدل قيمة المتر الطولي.</p>
              <p class="fw-normal fs-5">ب- المناور أو الفتحات في الأسقف أو الأسوار (إذا كان أقل أو في حدود متر مربع تحسب للطرف
                  الثاني، وفي حال زادت عن ذلك يكون الفاضي مليان.</p>

              <p class="fw-normal fs-5">
                  ت- إذا كان هناك ملاحق خارجية مشتركة مع السور فيلزم عند تمتير السور، ملاحظة عدم تمتير
                  جدار الملحق لأنه مشمول من ضمن مسطح الملحق .
              </p>
          </ul>

          <p class="fw-bold fs-4">15- غرامة التأخير:</p>
          <p class="fw-normal fs-5">
              تقع على الطرف الثاني غرامة تأخير في حال تأخر عن تسليم العمل خالل المدة
              المتفق عليها في هذا العقد، وعليه يتحمل غرامة مالية تراكمية تقدر بما
              يأتي:
          </p>

          <ul class="fw-normal fs-5">
              <li>ربع التكلفة اليومية في الأسبوع الأول.</li>
              <li>نصف التكلفة اليومية في الأسبوع الثاني.</li>
              <li>
                  كامل التكلفة اليومية في الأسبوع الثالث، وهكذا بشرط ألا تزيد إجمالي
                  غرامات التأخير عن  <span class="c-red">10% </span> من إجمالي قيمة العقد.
              </li>
          </ul>
          <p class="fw-normal fs-5">
              (التكلفة اليومية = قيمة العقد ÷ قيمة مدة العقد بالأيام).
          </p>
          <p class="fw-normal fs-5">
              أما في حال بلوغ إجمالي الغرامات <span class="c-red">10%</span> من قيمة العقد ولم ينتهي
              من العمل، فيحق للطرف الأول سحب العمل وإكمال باقي المشروع على حساب الطرف
              الثاني بعد إشعار بذلك قبل شهر من تاريخ سحب العمل والرجوع على الطرف
              الثاني إن وجد.
          </p>
          <p class="fw-normal fs-5">
              مع العلم بأنه يجوز الإتفاق بين الطرفين إما العدول عن قرار السحب
              واالإكتفاء بالخصم على الطرف الثاني حسب ما ورد أعلاه بشرط ألا تزيد قيمة
              الخصم عن <span class="c-red">20%</span> من إجمالي قيمة العقد، أو فسخ العقد ومحاسبة
              الطرف الثاني وإجراء المقاصة اللازمة.
          </p>
          <p class="fw-normal fs-5">
              15- لا يحق لأي من الطرفين فسخ العقد إلا بالتراضي وإجراء مخالصة بين الطرفين،
              وإذا تعذر انهاء العقد بالتراضي فيلتزم الطرف الذي يرغب في انهاءه بأن يقوم
              بعمل محضر إثبات حالة من مكتب هندسي محايد تحت إشراف الجهة القضائية
              المختصة على حسابه الشخصي.
          </p>
      </div>

      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" />
  </div>

  <div class="page-height page4">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />

      {{--4--}}
      <div class="container">
          <p class="fw-bold fs-4 mt-5">
              <span class="c-blue fw-bold fs-4">ثانياً/ وثيقة الشروط الخاصة:</span>
              (يتم الإختيار من البنود التالية في كل شرط وفق الاتفاق بين الطرفين)
          </p>
          <p class="fw-normal fs-5">
              1- تقع تكاليف تسوية الأرض والحفر للقواعد والخزان والبيارة على:
          </p>
          <div class="form-check fw-normal fs-5 " dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>

          <p class="fw-normal fs-5">2- تقع تكلفة الدفان على:</p>
          <div class="form-check fw-normal fs-5 " dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>

          <p class="fw-normal fs-5">3- تقع تكاليف المياه على:</p>
          <div class="form-check fw-normal fs-5 " dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>

          <p class="fw-normal fs-5">
              4- تقع تكاليف احضار عامل الرش بصفة دائمة في الموقع ولوقت إنهاء عمل
              المقاول على:
          </p>
          <div class="form-check fw-normal fs-5 " dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>

          <p class="fw-normal fs-5">
              5- تقع تكاليف رفع المعدات من مونة واسمنت وبلاط أو رمل أو بلوك أو غيره
              إلى مكان العمل على:
          </p>
          <div class="form-check fw-normal fs-5 " dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>

          <p class="fw-normal fs-5">6- يكون صب الخرسانة:</p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> بالمضخة (خرسانة جاهزة) </label>
          </div>
          <div class="form-check fw-normal fs-5 " dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> يدوي (خرسانة في الموقع) </label>
          </div>

          <p class="fw-normal fs-5">
              7- تقع تكاليف عمل القوالب الخشبية والفرم للحليات المعمارية والأقواس في
              الواجهات على:
          </p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>

          <p class="fw-normal fs-5">
              8- تكون تكاليف سلك الرباط على:
          </p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>

          <p class="fw-normal fs-5">
              9- تكون حراسة الموقع على:
          </p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المالك </label>
          </div>

          <p class="fw-normal fs-5">
              10- يلزم بناء حائط من البلوك تحت الميدة يبدأ من قاع مستوى الحفر وحتى منسوب الميدة وذلك لـ:
          </p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> محيط المنزل الخارجي ومحيط السور. </label>
          </div>
          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> محيط السور فقط. </label>
          </div>

      </div>

      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" />
  </div>

  <div class="page-height page5">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />

      {{--5--}}
      <div class="container">
          <p class="fw-normal fs-5">
              11- استخدام المباعدات الخرسانية (البسكوت) على:
          </p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>

          <p class="fw-normal fs-5">
              12- استخدام الحديد المجلفن (الزوايا) والسلم أثناء بناء 3 صفوف من البلوك
              على
          </p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>
          <p class="fw-normal fs-5">
              13- استخدام دهان البيتومين لجميع الأعمال الخرسانية الملامسة للتربة على:
          </p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>
          <p class="fw-normal fs-5">
              14- استخدام لفائف البيتومين أو أي عزل آخر في عزل خزان الماء الأرضي على
          </p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>
          <p class="fw-normal fs-5">15- استخدام الهزاز أثناء صب الخرسانة على:</p>

          <div class="form-check fw-normal fs-5 " dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>
          <p class="fw-normal fs-5">
              16- يلتزم الطرف الثاني بتوريد جميع المواد اللازمة للعمل من الشركات
              التالية: الحديد من مصنع <span class="c-red">..........</span> / الخرسانة
              الجاهزة من مصنع

              <span class="c-red">..........</span>/ البلوك من مصنع

              <span class="c-red">..........</span>/ سلك الرباط والمسامير من محل

              <span class="c-red">..........</span>/ نظام العزال الحراري أو نوع العازل
              للحوائط الخارجية من

              <span class="c-red">..........</span> / العزل الحراري للسطح من شركة

              <span class="c-red">..........</span> / عزل ضد الرطوبة للعناصر الإنشائية
              المدفونة على البارد من شركة

              <span class="c-red">..........</span> / العزل المائي من شركة

              <span class="c-red">..........</span>

              وسماكته للسطح أو الخزان ودورات المياه

              <span class="c-red">() مم.</span>
          </p>
          <p class="c-blue fw-bold fs-4">ثالثاً/ المواصفات الفنية:</p>
          <ul class="fw-normal fs-5 lh-lg">
              <li>
                  على الطرف الثاني أن يقوم بتخزين ونقل مخلفات الحفر ومواد البناء من حديد
                  وأسمنت وغيره بطريقة صحيحة بحيث لا تعيق العمل.
              </li>
              <li>
                  على المقاول استلام الأرض ومطابقة أبعادها على الطبيعة مع عقد الملكية
                  والتأكد من تطابق زوايا المبنى وفق المخططات.
              </li>
              <li>يجب أن يكون سطح الخنزيرة مستوي تماماً وأضلاعها متعامدة.</li>
              <li>
                  .يلزم بان يكون الحفر للقواعد إلى منسوب التأسيس مع ضرورة حفر الخزان
                  والبيارة وقواعد السور دفعة واحدة، وأن تكون أرضية الحفر وحدودها منتظمة.
              </li>
          </ul>
      </div>

      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" style="margin-top: 100px;"/>
  </div>

  <div class="page-height page6">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />

      {{--6--}}


      <div class="container">
          <ul class="fw-normal fs-5 lh-lg">
              <li>
                  على الطرف الثاني صندقة القواعد حسب المخطط، وأن تكون خالية من المخلفات
                  في حال صب الخرسانة.
              </li>
              <li>يلزم باستخدام الأسمنت القوي المقاوم للعوامل الخارجية.</li>
              <li>
                  يكون رش الخرسانات بعد 6 ساعات من الصب ومرتين في اليوم لمدة لا تقل عن
                  أسبوع.
              </li>
              <li>
                  الإلتزام بتوزيع مقاسات ووضعية حديد التسليح في جميع العناصر الإنشائية.
              </li>
              <li>
                  ضرورة التأكد من وضع فراغات بين قضبان الحديد من جميع الجوانب وذلك
                  لتسهيل الإحاطة والدخول للخرسانة بين الحديد.
              </li>

              <li>أن تكون الأشاير للأعمدة حسب المخطط.</li>
              <li>
                  <span class="fw-bold"> الخزان والبيارة: </span> أن يكون حديد قاعدة وسق
                  الخزان مصنوع من طبقتين أو حسب المخططات.
              </li>

              <li>
                  ألا يزيد الحفر عن 3م مع ملء الفراغ بين حددود البيارة بالبحص باستثناء
                  الجهة التي تقابل البيت تملأ بالدفان.
              </li>
              <li>
                  يتم بناء حائط البيارة من الحجر أو البلوك المصمت حسب طلب الطرف الأول.
              </li>
              <li>
                  <span class="fw-bold"> الأعمدة: </span> عند صب الخرسانة فوق خرسانة قديمة يجب التأكد من
                  ضرورة تنظيف الخرسانة الميتة المتهالكة من سط الخرسانة القديمة.
              </li>
              <li>
                  في حال لم يكن العمود دائرياً، ويحتوي على زوايا قائمة حسب المخططات،
                  فيجب شطف الزوايا القائمة 45 درجة بقطع خشب مثلثة تركب في القالب الخشبي.
              </li>
              <li>أن يكون العمود موزونا من كافة الجهات.</li>
              <li>
                  تحديد مستوى صب الخرسانة بدقة عالية حتى لا يكون قطع خرسانية لا زائدة من
                  الأعمدة تخترق السقف .
              </li>
              <li>
                  <span class="fw-bold"> الدرج: </span> إذا كان هناك درج جانبي لابد من وزن منسوب الدرج
                  بحيث لا يقل ارتفاع البسطة الأولى من منسوب الفناء .
              </li>
              <li>
                  يجب عدم وجود اختلافات في ارتفاع القائمة والنائمة للدرج باستثناء الدرجة
                  الأولى في الطابق الأرضي بحيث لا يقل ارتفاعها عن 25 سم، أما الدرجة
                  الأخيرة في الطابق الأول فيكون ارتفاعها حوالي 5 سم ليتم وزن ارتفاعها
                  لاحقاً بالبلاط والمونة عند 15 سم.
              </li>
              <li>
                  <span class="fw-bold">الأسقف:</span> يجب عمل سقوط في حدود 20 سم، وذلك في أسقف الحمامات
                  والمطابخ لوضع مواسير الصرف فيما بعد.
              </li>
              <li>
                  الإلتزام بقص أطراف حديد الجسور والفرش والغطاء بحيث تكون متساوية عند
                  حدود الشدة الخشبية.
              </li>

              <li>
                  يلزم عمل جسر مقلوب في السطح الأخير وفي الملاحق وفتحات التكييف بارتفاع
                  لا يقل عن 30سم
              </li>


          </ul>
      </div>

      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" style="margin-top: 80px;"/>
  </div>
  <div class="page-height page7">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />

      {{--7--}}
      <div class="container">
          <ul class="fw-normal fs-5 lh-lg">
              <li>
                  .الشدات الخشبية تدعيم كافة جوانب الشدات الخشبية للقواعد أو الميدات
                  بأخشاب مائلة لربط الطرف العلوي مع السفلي بسهولة.
              </li>
              <li>
                  تثبيت العمود ببرج من القوائم الخشبية الرأسية والمائلة، إضافة إلى تجليد
                  العمود وتدعيمه بعوارض كل 50 سم على الأقل.
              </li>

              <li>يلزم رش الشدات الخشبية بالماء قبل الصب وذلك لترطبيها وتنظيفها.</li>
              <li>
                  <span class="fw-bold"> المباني: </span> لابد من بناء الأبنية بعد صب
                  الأعمدة.
              </li>

              <li>
                  عدم فك الشدات الخشبية للقواعد والجسور قبل 24 ساعة والأسقف قبل مضي 3
                  أسابيع.
              </li>
              <li>
                  .عدم وضع شدات البلوك فوق الأسقف قبل مرور 72 ساعة على األقل من تاريخ
                  الصب.
              </li>
              <li>عدم استخدام الأعتاب الجاهزة التي تكون بسمك 5 سم.</li>
              <li>
                  ضرورة وزن الجدار بالقدة والميزان أفقياً ورأسياً، مع الحرص على وزن
                  المداميك والأعتاب.
              </li>
              <li>
                  لابد من أن يكون هناك طرف رباط متدرج عند توقف البناء ، مع ضرورة وجود
                  أكتاف للأبواب.
              </li>
              <li>يلزم عدم عمل مونة كبيرة تأخد وقتا طويلاً في الإستخدام.</li>
              <li>
                  .عند استخدام بلوك مفرغ لابد من التأكد بتعبئة كافة الفراغات بالمونة عند
                  جوانب الشبابيك والأبواب، وذلك لتثبيت الحلوق لاحقاً بطريقة صحيحة
              </li>
          </ul>

          <p class="fw-normal fs-5 me-3 mt-4">
              - إنهاء الأعمال والاستلام والتسليم: على الطرف الثاني إشعار الطرف الأول
              بأنه انتهى من العمل، بحيث يقوم الطرف الأول بإجراء التمتير النهائي
              واحتساب ما للطرف الثاني وتسليمه باقي أتعابه فوراً
          </p>

          <p class="fw-normal fs-5 me-3">- المراسلات وتوقيع العقد:</p>

          <p class="fw-normal fs-5">
              يتم إتمام المراسلات الرسمية بين الطرفين على العناوين الموضحة، ويلتزم كلا
              من الطرفين بتنبيه الطرف الآخر خطياَ في حال تغيير عنوانه، وقد تم توقيع
              هذا العقد من نسختين إلكترونياً .
          </p>

          <p class="text-center my-3 fw-bold fs-4">والله ولي التوفيق</p>
      </div>


      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image"  style="margin-top: 190px;"/>
  </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

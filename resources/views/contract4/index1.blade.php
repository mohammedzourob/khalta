x<!DOCTYPE html>
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
              font-size: 14px !important;
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
          <h4 class="c-red text-center my-3 fw-bold">عقد مصنعية الدهانات</h4>

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
              لإقامة المشروع على قطعة الأرض المشار إليها أعلاه ويرغب في تكليف مقاول
              لأعمال ( مصنعية الدهانات )
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
                  2- تكون مهام عمل الطرف الثاني مصنعية الدهانات لكل مسطحات مشروع الطرف
                  الأول الداخلية والخارجية.
              </p>
              <p class="fw-normal fs-5">
                  3- على الطرف الثاني أن يلتزم بإحضار العمالة ذات الخبرة في تنفيذ جميع
                  الأعمال التي وردت أعلاه، وعليه فإن مسؤوليتهم النظامية تقع على الطرف
                  الثاني.
              </p>
              <p class="fw-normal fs-5">
                  4- يتعهد بأن ينفذ جميع الأعمال حسب المواصفات الواردة.
              </p>
              <p class="fw-normal fs-5">
                  5- في حال مخالفة الطرف الثاني لما جا في البند السابق فعلى الطرف الثاني
                  أن يقوم بإزالة الأعمال المخالفة على حسابه الشخصي.
              </p>
              <p class="fw-normal fs-5">
                  6- يلتزم الطرف الثاني بإنهاء جميع الأعمال وتسليم المشروع في مدة أقصاها
                  <span class="c-red">....... شهر</span> من تاريخ توقيع العقد.
              </p>
              <p class="fw-normal fs-5">
                  7- هذا العقد خاضع لأنظمة(المملكة العربية السعودية) وفي حال وجود خلاف
                  لما ورد يقع تحت طائلة المسؤولية القانونية.
              </p>
              <p class="fw-normal fs-5">
                  8- على الطرف الأول أن يلتزم بدفع أتعاب الطرف الثاني حسب ما هو متفق
                  عليه في موعدها، وفي حال كان هناك تأخير لمدة أقصاها
                  <span class="c-red">15 يوماً</span> يحق للطرف الثاني التوقف عن العمل
                  بعد إشعار الطرف الأول بذلك قبل <span class="c-red">5 أيام</span> من
                  التوقف.
              </p>
          </div>
      </div>


  <img class="footer" src="{{('/image/footer.png')}}" alt="footer image"  style="margin-top:0px ; "/>
  </div>

  <div class="page-height">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" style="margin-bottom: 10px;" />

      {{--2--}}
      <div class="container">


          <p class="fw-normal fs-5">
              9- يلتزم الطرف الأول بما يلي:
          </p>



          <ul class="fw-normal fs-5 lh-lg">
              <li>
                  تزويد الطرف الثاني بنسخة من المخططات.
              </li>
              <li> التراخيص اللازمة للبناء ومراجعة الدوائر الحكومية إذا لزم الأمر.</li>
              <li>الكهرباء المؤقتة للموقع.</li>
              <li> تكاليف المياه للموقع. </li>
              <li>دفع قيمة جميع مواد البناء الموردة للمشروع ماعدا ما تم الإتفاق على خالفه في هذا العقد. </li>


          </ul>
          <p class="fw-normal fs-5"> 10- لا يحق للطرف الأول القيام بأي تعديل بعد بدء الطرف الثاني بتنفيذ الأعمال المطلوبة، وفي حال
              كان هناك تعديلات تكون على حساب الطرف الأول. </p>
          <p class="fw-bold fs-5">11- الأتعاب:</p>

          <ul class="fw-normal fs-5">
              <li>سعر المتر المربع للسقر مصنعية دهان البلاستيك <span class="c-red">........ ريال
                    سعودي.</span></li>
              <li> سعر المتر المربع مصنعية دهان لياتي <span class="c-red"> .......... ريال سعودي.</span></li>
              <li> سعر المتر المربع مصنعية ركة أو دهان خارجي (المسطحات التي تحتاج إلى سقايل) <span class="c-red"> .......... ريال سعودي.</span></li>
              <li> سعر دهان الباب الخشبي الواحد بما فيه الحلق <span class="c-red"> .......... ريال سعودي.</span></li>
              <li> سعر دهان الباب الحديدي الواحد بما فيه الحلق <span class="c-red"> .......... ريال سعودي.</span></li>
          </ul>

          <p class="fw-bold fs-5">12- الدفعات:</p>

          <p class="fw-normal fs-5">
              تم تقدير إجمالي أتعاب الطرف الثاني حسب األسعار الواردة أعاله بموجب المخططات بمبلغ وقدره <span class="c-red">
                .......... ريال سعودي</span>، وذلك حسب النسب ادناه:
          </p>

          <ul class="fw-normal fs-5">
              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">.......................................................</span>
              </li>

              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">.......................................................</span>
              </li>
              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">.......................................................</span>
              </li>
              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">.......................................................</span>
              </li>
              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">.......................................................</span>
              </li>
              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">.......................................................</span>
              </li>
          </ul>
          <p class="fw-bold fs-5">13- القياس والتمتير:</p>
          <p class="fw-normal fs-5">المعتمد في صافي أتعاب الطرف الثاني هو القياس على الطبيعة في نهاية العقد مع اعتبار ما
              يلي:</p>
          <ul>
              <p class="fw-normal fs-5">أ- البرولات والكرانيش تحسب من ضمن مسطحات التمتير.</p>
              <p class="fw-normal fs-5">ب- الأبواب أو النوافذ أو الفتحات الموجودة في الأسقف والتي ليس لها جدران (إذا كان
                  مساحتها
                  متر مربع أول أقل تحسب للطرف الثاني، وإذا زادت عن ذلك يكون الفاضي مليان.</p>
          </ul>
      </div>

      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" style="margin-top: 0px;" />
  </div>

  <div class="page-height">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" style="margin-bottom: 10px;" />

      {{--3--}}
      <div class="container">
          <p class="fw-bold fs-4">14- غرامة التأخير:</p>
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
                  غرامات التأخير عن <span class="c-red">10% </span> من إجمالي قيمة
                  العقد.
              </li>
          </ul>
          <p class="fw-normal fs-5">
              (التكلفة اليومية = قيمة العقد ÷ قيمة مدة العقد بالأيام).
          </p>
          <p class="fw-normal fs-5">
              أما في حال بلوغ إجمالي الغرامات <span class="c-red">10%</span> من قيمة
              العقد ولم ينتهي من العمل، فيحق للطرف الأول سحب العمل وإكمال باقي المشروع
              على حساب الطرف الثاني بعد إشعار بذلك قبل شهر من تاريخ سحب العمل والرجوع
              على الطرف الثاني إن وجد.
          </p>
          <p class="fw-normal fs-5">
              مع العلم بأنه يجوز الإتفاق بين الطرفين إما العدول عن قرار السحب
              واالإكتفاء بالخصم على الطرف الثاني حسب ما ورد أعلاه بشرط ألا تزيد قيمة
              الخصم عن <span class="c-red">20%</span> من إجمالي قيمة العقد، أو فسخ
              العقد ومحاسبة الطرف الثاني وإجراء المقاصة اللازمة.
          </p>
          <p class="fw-normal fs-5">
              15- لا يحق لأي من الطرفين فسخ العقد إلا بالتراضي وإجراء مخالصة بين
              الطرفين، وإذا تعذر انهاء العقد بالتراضي فيلتزم الطرف الذي يرغب في انهاءه
              بأن يقوم بعمل محضر إثبات حالة من مكتب هندسي محايد تحت إشراف الجهة
              القضائية المختصة على حسابه الشخصي.
          </p>

          <p class="fw-bold fs-4 mt-5">
              <span class="c-blue fw-bold fs-4">ثانياً/ وثيقة الشروط الخاصة:</span>
              (يتم الإختيار من البنود التالية في كل شرط وفق الاتفاق بين الطرفين)
          </p>
          <p class="fw-normal fs-5">1- عدد أوجه المعجون:</p>
          <div class="form-check fw-normal fs-5 mb-3" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> وجهين متعامدين </label>
          </div>
          <div class="form-check fw-normal fs-5 mb-3" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> ثالثة أوجه متعامدة </label>
          </div>

          <p class="fw-normal fs-5">
              2- تقع تكلفة مواد الصنفرة والشطرطونات والأغطية البلاستيكية على:
          </p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المالك </label>
          </div>
          <div class="form-check fw-normal fs-5 mb-3" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>
          <p class="fw-normal fs-5">3- يتم عمل المعجون في الموقع بوساطة:</p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> الخلط اليدوي </label>
          </div>
          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> معجون جاهز </label>
          </div>
      </div>


      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image"  />
  </div>

  <div class="page-height page4">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />

      {{--4--}}

      <div class="container">
          <p class="fw-normal fs-5">4- عدد أوجه الدهان الداخلي</p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> وجه واحد </label>
          </div>
          <div class="form-check fw-normal fs-5 mb-3" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> وجهين </label>
          </div>

          <div class="form-check fw-normal fs-5 mb-3" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> 3 أوجه </label>
          </div>

          <p class="fw-normal fs-5">5- يكون الدهان للحوائط من نوع:</p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> زياتي </label>
          </div>
          <div class="form-check fw-normal fs-5 mb-3" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> بلاستيكي </label>
          </div>
          <div class="form-check fw-normal fs-5 mb-3" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> رشة </label>
          </div>
          <p class="c-blue fw-bold fs-4">ثالثاً/ المواصفات الفنية:</p>
          <p class="fw-bold fs-4">1- .دهان الحائط:</p>
          <ul class="fw-normal fs-5 lh-lg square-list">
              <li>
                  يجب تنظيف سطح الحائط المراد دهنه جيداً، مع مراعاة معالجة التشققات
                  ويترك حتى يجف تماماً.
              </li>
              <li>
                  يتم طلاء السطح بالأساس، مع مراعاة أن يكون من نفس الشركة المصنعة
                  للدهان.
              </li>
              <li>
                  معجنة السطح بوجهين متعامدين أو حسب المخططات بلونين مختلفين قليلاً.
              </li>
              <li>
                  يترك السطح بعد ذلك حتى يجف تماماً بعد المعجون، مع ضرورة الصنفرة بعد كل
                  وجه.
              </li>
              <li>
                  لابد من التأكد من جفاف الوجه المدهون قبل البدء في دهان الوجه التالي.
              </li>
              <li>
                  في حال تم استعمال معجون محضر في الموقع فلابد من خلط زي المعجون مع (2)
                  اسبيداج (1) حتى يتم الحصول على خلطة متجانسة يسهل لصقها على الحائط.
              </li>
              <li>
                  عدم دهان الوجه األخير قبل تركيب الأبواب والنوافذ والأجهزة الكهربائية.
              </li>
          </ul>

          <p class="fw-bold fs-4">2- .دهان الحديد:</p>
          <ul class="fw-normal fs-5 lh-lg square-list">
              <li>
                  مراعاة تنظيف السطح من الشحوم والزيوت وإزالة الصدأ وقشور الحديد
                  البارزة.
              </li>
              <li>
                  مراعاة عدم تنعيم أسطح الحديد تماماً، مع ضرورة دهن الأسطح بالسلقون
                  وجهين متعامدين للحد من الصدأ.
              </li>
              <li>طلاء السطح بعد ذلك بالدهان الزيتي حسب المواصفات.</li>
          </ul>
      </div>

      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" style="margin-top: 50px;" />
  </div>

  <div class="page-height page5">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />

      {{--5--}}

      <div class="container">
          <p class="c-blue fw-bold fs-4">ثالثاً/ المواصفات الفنية:</p>
          <p class="fw-bold fs-4">3- .دهان الخشب:</p>
          <ul class="fw-normal fs-5 lh-lg square-list">
              <li>
                  صنفرة الأسطح من خلال ورق الصنفرة للحصول على سطح ناعم ثم تنظيفه من
                  المخلفات.
              </li>
              <li>دهن السطح بوجه تحضير (دهان برايمر) ذو أساس زيتي خاص بالخشب.</li>
              <li>
                  تعبئة الفراغات في الأسطح الخشبية بمعجون خاص بالخشب، مع مراعاة صنفرتها
                  جيداً بعد ذلك.
              </li>
              <li>دهن السطح بوجه أول ثم تركه حتى يجف تماماً.</li>
              <li>
                  أخيراً يتم طلاء الأسطح الخشبية وجهين متعامدين وفقاً للون المطلوب.
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

      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" style="margin-top: 330px;"/>
  </div>






    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

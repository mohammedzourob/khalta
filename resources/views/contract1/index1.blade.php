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
              /*font-family: ;*/

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

          .footer{
              width: 110%;
              margin: 0 auto;
              display: flex;
              /*height: 190px;*/
          }
          .page-height{
              max-height: 300px;
          }
          .fs-5{
              font-size: 14px !important;
          }
          p{
              /*margin-bottom: 0;*/
          }
          /*.page3{*/
          /*    font-size: 20px !important;*/

          /*}*/
      </style>
    <title>Contract</title>
  </head>
  <body>

  <div class="page-height">
  <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />

    <div class="container">
      <h4 class="c-red text-center my-3 fw-bold">عقد مصنعية اللياسة</h4>

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
        الأرض ذات الصك رقم
          {{$pdf->Instrument_no}} في تاريخ
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
          2- تكون مهام عمل الطرف الثاني مصنعية اللياسة لكافة مسطحات مشروع الطرف
          الأول.
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

  <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" />
  </div>
  <div class="page-height">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />
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
              <li>سعر المتر المربع مصنعية لياسة داخلية شاملاً للحوائط والأسقف والسور <span class="c-red">........ ريال
                    سعودي.</span></li>
              <li>سعر المتر المربع مصنعية لياسة خارجية <span class="c-red"> .......... ريال سعودي.</span></li>
          </ul>

          <p class="fw-bold fs-5">12- الدفعات:</p>

          <p class="fw-normal fs-5">


              تم تقدير إجمالي أتعاب الطرف الثاني حسب األسعار الواردة أعاله بموجب المخططات بمبلغ وقدره <span class="c-red">
                .......... ريال سعودي</span>، وذلك حسب النسب ادناه:

          </p>

          <ul class="fw-normal fs-5">
              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">................................................................................................................</span>
              </li>

              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">.................................................................................................................</span>
              </li>
              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">.................................................................................................................</span>
              </li>
              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">.................................................................................................................</span>
              </li>
              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">................................................................................................................</span>
              </li>
              <li>
                  دفعة <span class="c-red"> ..... %</span> بعد <span
                      class="c-red">................................................................................................................</span>
              </li>
          </ul>
          <p class="fw-bold fs-5">13- القياس والتمتير:</p>
          <p class="fw-normal fs-5">المعتمد في صافي أتعاب الطرف الثاني هو القياس على الطبيعة في نهاية العقد مع اعتبار ما
              يلي:</p>
          <ul>
              <p class="fw-normal fs-5">أ- البرولات والكرانيش تحسب من ضمن مسطحات التمتير.</P>
              <p class="fw-normal fs-5">ب- الأبواب أو النوافذ أو الفتحات الموجودة في الأسققف والتي ليس لها جدران (إذا كان
                  مساحتها
                  متر مربع أول أقل تحسب للطرف الثاني، وإذا زادت عن ذلك يكون الفاضي مليان.</p>
          </ul>
      </div>

      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" />
  </div>
  <div class="page-height ">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />


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

          <p class="fw-bold fs-4 mt-5">
              <span class="c-blue fw-bold fs-4">ثانياً/ وثيقة الشروط الخاصة:</span>
              (يتم الإختيار من البنود التالية في كل شرط وفق الاتفاق بين الطرفين)
          </p>
          <p class="fw-normal fs-5">
              1- تقع تكاليف احضار عامل الرش بصفة دائمة في الموقع ولوقت إنهاء عمل
              المقاول على:
          </p>
          <div class="form-check fw-normal fs-5 mb-3" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المالك </label>
          </div>

          <p class="fw-normal fs-5">
              2- تقع تكاليف رفع المعدات من مونة واسمن وبلاط أو رمل أو بلوك أو غيره إلى
              مكان العمل على:
          </p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المالك </label>
          </div>
          <div class="form-check fw-normal fs-5 mb-3" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>
          <p class="fw-normal fs-5">3- تقع تكاليف شبك اللياسة مع المسامير على:</p>

          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المالك </label>
          </div>
          <div class="form-check fw-normal fs-5" dir="rtl">
              <input type="checkbox" />
              <label class="form-check-label"> المقاول </label>
          </div>
      </div>

      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" />
  </div>
  <div class="page-height">
      <img class="logo" src="{{('/image/logo.png')}}" alt="logo" />

      <div class="container">
          <p class="c-blue fw-bold fs-4">ثالثاً/ المواصفات الفنية:</p>
          <ul class="fw-normal fs-5 lh-lg">
              <li>
                  ضرورة بدء العمل داخل المشروع من السترة والسطح نزولاً إلى الدور الأول
                  ثم الأرضي.
              </li>
              <li>
                  أن يلتزم الطرف الثاني بتنظير الجدران والأسطح من الزوائد الخرسانية
                  والأخشاب والأوراق قبل أن يبدأ بالعمل.
              </li>
              <li>
                  يجب على الطرف الثاني ملء الفتحات في الجدران بالمونة وتخشينها قبل أن
                  يبدأ في الطرطشة.
              </li>
              <li>
                  لابد من تركيب شبك اللياسة عند التقاء البلوك والخرسانة، وأيضاً عند
                  التمديدات الكهربائية
              </li>
              <li>
                  ضرورة رش الجدار بالماء قبل الطرطشة، مع مراعاة عمل المعايير لنسب الرمل
                  والأسمنت بالصندوق قبل عمل اللياسة.
              </li>
              <li>
                  يجب أن تكون الطرطشة مسمارية وتغطي كل الجدار وتخفي معالمه مع ملاحظة
                  وزينة الطرطشة بمعدل 450 كجم لكل 1م مكعب رمل.
              </li>
              <li>
                  ضرورة رش الطرطشة بالماء ولمدة 3 أيام قبل الانتقال إلى المرحلة التالية.
              </li>
              <li>
                  لا يسمح باللياسة إلا بعد أن يتم استلام الحوائط بالبؤج ووزن الجدار
                  أفقياً وعمودياً وعند الأركان
              </li>
              <li>
                  عمل اللياسة بمؤنة 300 كجم لكل 1 م مكعب، ويمنع استخدام الجبس في جميع
                  الأحوال.
              </li>

              <li>
                  يجب أن تكون مستوى جلسة النوافذ مائلة إلى الخارج، مع مراعاة أن يتم
                  الانتهاء من كامل الغرفة مع حواف النوافذ دفعة واحدة.
              </li>
              <li>
                  يتم استخدام المونة خلال ساعتين من تجهيزها، وعدم تحضير كميات زائدة
              </li>
              <li>شطف الزوايا عند الأركان 45 درجة.</li>
              <li>
                  في حال كان هناك بروز في الجدران أو الخرسانات لابد من تكسيره وذلك بعد
                  موافقة الطرف الأول والمهندس المشرف، أما في حال كان هناك هبوط في مستوى
                  الجدار فيجب عمل اللياسة على طبقتين: طبقة بطانة، طبقة ظهارة.
              </li>
          </ul>

          <p class="fw-normal fs-5 me-3 mt-4">
              - إنهاء الأعمال والاستلام والتسليم: على الطرف الثاني إشعار الطرف الأول
              بأنه انتهى من العمل، بحيث يقوم الطرف الأول بإجراء التمتير النهائي
              واحتساب ما للطرف الثاني وتسليمه باقي أتعابه فوراً
          </p>

          <p class="fw-normal fs-5 me-3 ">- المراسلات وتوقيع العقد:</p>

          <p class="fw-normal fs-5">
              يتم إتمام المراسلات الرسمية بين الطرفين على العناوين الموضحة، ويلتزم
              كلا من الطرفين بتنبيه الطرف الآخر خطياَ في حال تغيير عنوانه، وقد تم توقيع
              هذا العقد من نسختين إلكترونياً .
          </p>

          <p class="text-center my-3 fw-bold fs-4"> والله ولي التوفيق </p>
      </div>
      <img class="footer" src="{{('/image/footer.png')}}" alt="footer image" />
  </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

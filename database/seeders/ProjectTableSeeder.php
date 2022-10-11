<?php

namespace Database\Seeders;

use App\Models\Projects;
use App\Models\Sections;
use App\Models\Special_conditions;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projects::create([
            "name"=> "المشاريع السكنية",
            "icon"=> "logo\Group3292.png",
            "type" => 1,
            "Status" => "1",

        ]);
        Projects::create([
            "name"=> "المشاريع التجارية",
            "icon"=> "logo\Group3291.png",
            "type" => 1,
            "Status" => "1",

        ]);
        Projects::create([
            "name"=> "المشاريع الفندقية",
            "icon"=> "logo\Group3290.png",
            "type" => 1,
            "Status" => "1",

        ]);
        Projects::create([
            "name"=> "المشاريع الاخرى",
            "icon"=> "logo\Group3289.png",
            "type" => 1,
            "Status" => "1",

        ]);
        Projects::create([
            "name"=> "اللياسة",
            "icon"=> "logo\Group3293.png",
            "type" => 2,
            "Status" => "1",

        ]);
        Projects::create([
            "name"=> "البلاط",
            "icon"=> "logo\Group3294.png",
            "type" => 2,
            "Status" => "1",

        ]);
        Projects::create([
            "name"=> "الدهان",
            "icon"=> "logo\Group3295.png",
            "type" => 2,
            "Status" => "1",

        ]);
        Projects::create([
            "name"=> "الجبس بورد",
            "icon"=> "logo\Group3296.png",
            "type" => 2,
            "Status" => "1",

        ]);

        Sections::create([
            "project_id"=> 1,
            "name"=> "فيلا",
            "status" => "1",

        ]);
        Sections::create([
            "project_id"=> 1,
            "name"=> "دور ارضي",
            "status" => "1",

        ]);
        Sections::create([
            "project_id"=> 1,
            "name"=> "عمارة",
            "status" => "1",

        ]);
        Sections::create([
            "project_id"=> 1,
            "name"=> "دوبليكس",
            "status" => "1",

        ]);
        Sections::create([
            "project_id"=> 1,
            "name"=> "شاليهات",
            "status" => "1",

        ]);
        Sections::create([
            "project_id"=> 1,
            "name"=> "استراحات",
            "status" => "1",

        ]);
//مشاريع تجارية
        Sections::create([
            "project_id"=> 2,
            "name"=> "صالة تجارية",
            "status" => "1",

        ]);
        Sections::create([
            "project_id"=> 2,
            "name"=> "مجمع تجاري",
            "status" => "1",

        ]);
        Sections::create([
            "project_id"=> 2,
            "name"=> "مستودع",
            "status" => "1",

        ]);
//مشاريع فندقية
        Sections::create([
            "project_id"=> 3,
            "name"=> "فنادق",
            "status" => "1",

        ]);

        Sections::create([
            "project_id"=> 3,
            "name"=> "شقق فندقية",
            "status" => "1",

        ]);


//Special_conditions
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "تكون تكاليف تسوية الأرض والحفر للقواعد والخزان والبيارة علي",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "تكون تكاليف الدفان على",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "تكاليف المياه للموقع على",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "إحضار عامل للرش بصفة دائمة في الموقع لحين إنهاء عمل المقاول",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> " تطليع المونة أو الاسمنت أو الرمل أو البلوك أو خلافه إلى مكان العمل",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "اضافة السلم والزواية المعدنية اثناء البناء",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "عمل القوالب الخشبية والفرم للحليات المعمارية والأقواس للواجهات",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "تكون تكاليف سلك الرباط على",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "إذا كان الصب بالخرسانة الجاهزة فتكون تكاليفها على",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "استخدام المباعدات الخرسانية (البسكوت) على",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "استحدام دهان البتومين لجمع العماصر الملامسة لتربة",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "استخدام لفائف البيتومين في الخزان الماء",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "استخدام الهزاز في جميع العناصر الخرسانية",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "يكون صب الخرسانة",
        ]);
        Special_conditions::create([
            "project_id"=> 1,
            "question"=> "يلزم بناء حائط من البلوك تحت الميدة يبدأ  قاع مستوى الحفر  حتى منسوب الميدة",
        ]);
//اللياسة
        Special_conditions::create([
            "project_id"=> 5,
            "question"=> "تكون تكاليف احضار عامل للرش بصفة دائمة في لبموقع لحين انهاء عمل المقاول",
        ]);
        Special_conditions::create([
            "project_id"=> 5,
            "question"=> "تكون تكاليف تطليع المونة او الاسمنت او الرمل او خلافة الي مكان العمل",
        ]);
        Special_conditions::create([
            "project_id"=> 5,
            "question"=> "تكون تكاليف شبك اللياسة مع السامير",
        ]);
        Special_conditions::create([
            "project_id"=> 5,
            "question"=> "الابواب او النوافذ او الفتحات التي في الاسقف والتي ليس لها جدران",
        ]);
    }
}

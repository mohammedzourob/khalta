<?php

namespace Database\Seeders;

use App\Models\About_us;
use App\Models\Bond;
use App\Models\Connect_us;
use App\Models\Contracts;
use App\Models\Invoices;
use App\Models\Projects;
use App\Models\Schedule_of_work;
use App\Models\Work;
use Illuminate\Database\Seeder;

class ContyactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contracts::create([
            "user_id"=> 3,
            "section_id"=> 1,
            "project_id" => 1,
            "construction_type" => 1,
            "code" => 5124,
            "id_card_number" => 123456,
            "id_card_date" => '2022-03-02',
            "status_card_issuer" => 'gaza',
            "status"=>1,
            "building_permit_number"=> 456

        ]);
        Invoices::create([
            "contract_id"=>1,
            "name"=> 'شراء حديد',
            "image"=> 'zzz',
            "date"=>  '2022-03-02',
            "publisher"=> 'Ahmad',
        ]);
        Work::create([
            "contract_id"=>1,
            "name"=> 'صب باطون',
            "image"=> 'zzz',
            "date"=>  '2022-03-01',
            "publisher"=> 'Ahmad',
        ]);
        Schedule_of_work::create([
            "contract_id"=>1,
            "name"=> 'حسن بن عبد الله',
            "email"=> 'z@z.com',
            "date"=>  '2022-03-01',
            "publisher"=> 'Ahmad',
        ]);

        Bond::create([
            "contract_number"=>123481,
            "supervisor_name"=> 'مسعود بن عبد الله',
            "exchange_amount"=> 500,
            "date_of_application"=>  '2022-03-01',
            "exchange_reason"=> 'شراء حديد',
        ]);
        Connect_us::create([
            "phone"=> 595604849 ,
            "email"=> 'z@z.com',
            "content"=> 'مرحبا انا عبد الله ولدي مشروع ارجو التواصل معي',

        ]);
        About_us::create([
          "logo"=> 'logo/logo',
        "content"=> 'شركة مقاولات متخصص في تشطيب الشقق السكنية والبناء',
        "terms_conditions"=> 'الشروط والاحكام',

    ]);
    }
}

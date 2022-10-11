<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=> "Admin",
            "email" => "a@a.com",
            "password"=> bcrypt('123123'),
            "type" => 1,
            "Status" => "1",
            "email_verified_at"=> now()
        ]);
        User::create([
            "name"=> "supervisor",
            "email" => "s@s.com",
            "password"=> bcrypt('123123'),
            "type" => 2,
            "Status" => "1",
            "email_verified_at"=> now()
        ]);
        User::create([
            "name"=> "Ahamd Alashi",
            "email" => "z@z.com",
            "password"=> bcrypt('123123'),
            "type" => 3,
            "Status" => "1",
            "email_verified_at"=> now()
        ]);
    }
}

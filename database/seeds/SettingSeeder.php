<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */



    public function run()
    {
        


        Setting::create([
            "site_title" => "Del-York",
            "site_email" => "markjone@gmail.com",
            "site_mobile" => "+4917669727062",
            "metadata" => [0 => [
                "key" => "site_address",
                "value" => "No 10 john lekki"
            ],
            1 =>[
                "key" => "currency",
                "value" => "₦"
            ]
        ],
        ]);
    }
}

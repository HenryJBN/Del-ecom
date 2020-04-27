<?php

use App\Product_Settings;
use Illuminate\Database\Seeder;

class ProductSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product_Settings::create([
            "cart_vat" => 0,
            "invoice_address" => "demo@de-york.com",
            "metadata" => [0 => [
                "key" => "invoice_name",
                "value" => "Del-York NIG"
            ]
        ],
        ]);
    }
}

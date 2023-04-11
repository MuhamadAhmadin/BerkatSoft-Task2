<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "sale_id" => 1,
                "product_id" => 1,
                "qty" => 2,
            ],
            [
                "sale_id" => 1,
                "product_id" => 2,
                "qty" => 1,
            ],

            [
                "sale_id" => 2,
                "product_id" => 3,
                "qty" => 5,
            ],
        ];

        DB::table('sale_details')->insert($data);
    }
}

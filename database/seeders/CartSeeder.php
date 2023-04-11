<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
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
                "product_id" => 1,
                "qty" => 2,
            ],
            [
                "product_id" => 2,
                "qty" => 1,
            ],
        ];

        DB::table('carts')->insert($data);
    }
}

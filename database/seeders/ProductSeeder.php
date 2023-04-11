<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
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
                "name" => "USB Sandisk",
                "desc" => "This is an USB Sandisk 32GB",
                "price" => 100000,
            ],
            [
                "name" => "Simbadda Audio",
                "desc" => "This is Simbadda Audio",
                "price" => 400000,
            ],
            [
                "name" => "Ring Light",
                "desc" => "This is an ring light",
                "price" => 50000,
            ],
        ];

        DB::table('products')->insert($data);
    }
}

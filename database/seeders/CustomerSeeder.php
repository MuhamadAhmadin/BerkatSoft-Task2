<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
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
                "name" => "M. Ahmadin",
                "email" => "ahmadinations@gmail.com",
                "address" => "Cirebon",
            ],
            [
                "name" => "Inggit M",
                "email" => "inggitmarg@gmail.com",
                "address" => "Majalengka",
            ],
        ];

        DB::table('customers')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
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
                "customer_id" => 1,
                "invoice_no" => "INV-1",
                'grand_total' => 1000000,
                "created_at" => date('Y-m-d H:i:s'),
            ],
            [
                "customer_id" => 2,
                "invoice_no" => "INV-2",
                'grand_total' => 3000000,
                "created_at" => date('Y-m-d H:i:s'),
            ],
        ];

        DB::table('sales')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Payment extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert(
            [
                ['name' => 'MoMo'],
                ['name' => 'Internet Banking'],
                ['name' => 'VN Pay']
            ]
        );
    }
}

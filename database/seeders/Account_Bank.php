<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Account_Bank extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('account_banks')->insert([
            [
                'name' => 'Nguyen Tuan Anh',
                'account_number' => 0351001160715,
                'branch' => 'Chi nhánh Bắc Ninh',
                'bank_id' => 1
            ],
            [
                'name' => 'Nguyen Tuan Anh',
                'account_number' => 123133123123,
                'branch' => 'Chi nhánh Quảng Ninh',
                'bank_id' => 2
            ],
            [
                'name' => 'Nguyen Tuan Anh',
                'account_number' => 53453534543,
                'branch' => 'Chi nhánh Ninh Bình',
                'bank_id' => 3
            ]
        ]);
    }
}

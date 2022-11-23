<?php

namespace Database\Seeders;

use App\Models\Bank\BankAccounts;
use App\Models\Bank\Transaction;
use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankAccounts::create([
            'title'         =>  'Cash',
            'account_type'  => 'cash',
            'account_no'    =>  00000,
            'debit'         =>  0,
            'credit'        =>  0,
            'balance'       =>  100000,
        ]);
    }
}

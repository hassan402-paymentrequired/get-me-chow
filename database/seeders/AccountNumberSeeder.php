<?php

namespace Database\Seeders;

use App\Models\AccountNumber;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accountNumbers = [
            [
                'bank_name' => 'First bank',
                'account_number' => '73290291092',
                'account_name' => 'Ajo mattwen',
                'user_id' =>  User::pluck('id')->random()
            ],
            [
                'bank_name' => 'Access bank',
                'account_number' => '62782992322',
                'account_name' => 'Ibrahim tunde',
                'user_id' =>  User::pluck('id')->random()
            ],
            [
                'bank_name' => 'Eco bank',
                'account_number' => '392002883',
                'account_name' => 'Bolu olatunji',
                'user_id' =>  User::pluck('id')->random()
            ],
            [
                'bank_name' => 'Opay',
                'account_number' => '090289289292',
                'account_name' => 'Femi taiwo',
                'user_id' =>  User::pluck('id')->random()
            ],
        ];
                
        foreach ($accountNumbers as $accountNumber) {
            AccountNumber::create([
                'bank_name' => $accountNumber['bank_name'],
                'account_number' => $accountNumber['account_number'],
                'account_name' => $accountNumber['account_name'],
                'user_id' => $accountNumber['user_id']
            ]);
        }
    }
}

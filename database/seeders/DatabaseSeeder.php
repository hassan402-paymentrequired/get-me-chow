<?php

namespace Database\Seeders;

use App\Models\AccountNumber;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
   

        $this->call(FloorSeeder::class);


        User::factory(20)->create();

        $this->call(AccountNumberSeeder::class);
    }
}

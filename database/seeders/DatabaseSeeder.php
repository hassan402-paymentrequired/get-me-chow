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
        $index = 1;
        User::factory(20)->create()->each(function ($user) use (&$index) {
            if ($user->is_buyer) {
                $user->update([
                    'rotation_index' => $index,
                ]);
                $index = $index + 1;
            } else {
                $user->update([
                    'rotation_index' => null,
                ]);
            }
        });

        $this->call([AccountNumberSeeder::class, DutyRotationTableSeeder::class]);
    }
}

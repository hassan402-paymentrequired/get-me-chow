<?php

namespace Database\Seeders;

use App\Models\DutyRotationTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DutyRotationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DutyRotationTable::create(['start_date' => now()]);

    }
}

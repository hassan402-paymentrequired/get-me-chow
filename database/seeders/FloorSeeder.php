<?php

namespace Database\Seeders;

use App\Models\Floor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $floors = [
            [
                'name' => 'Brainstorm'
            ],
            [
                'name' => 'Engine room'
            ],
            [
                'name' => 'The blend'
            ],
            [
                'name' => 'The Cockpit'
            ],
        ];

        // array_map(fn($fl) => Floor::updateOrCreate(['name' => $fl['name']], $fl), $floors);
        // array_map(fn($fl) => Floor::create($fl), $floors);
        foreach ($floors as $floor) {
          Floor::create([
            'name' => $floor['name']
          ]);
        }
    }
}

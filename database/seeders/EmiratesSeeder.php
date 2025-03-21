<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmiratesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emirates = [
            ['id' => 1, 'name' => 'Umm Al Quwain', 'country_id' => 182],
            ['id' => 2, 'name' => 'Ras Al Khaimah', 'country_id' => 182],
            ['id' => 3, 'name' => 'Fujairah', 'country_id' => 182],
            ['id' => 4, 'name' => 'Ajman', 'country_id' => 182],
            ['id' => 5, 'name' => 'Sharjah', 'country_id' => 182],
            ['id' => 6, 'name' => 'Dubai', 'country_id' => 182],
            ['id' => 7, 'name' => 'Abu Dhabi and Al Ain', 'country_id' => 182],
        ];

        DB::table('emirates')->insert($emirates);
    }
}

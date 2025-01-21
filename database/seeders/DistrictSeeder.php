<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('districts')->truncate();
        Schema::enableForeignKeyConstraints();

        $districts = [
            ['name' => 'Ampara'],
            ['name' => 'Anuradhapura'],
            ['name' => 'Badulla'],
            ['name' => 'Batticaloa'],
            ['name' => 'Colombo'],
            ['name' => 'Galle'],
            ['name' => 'Gampaha'],
            ['name' => 'Hambantota'],
            ['name' => 'Jaffna'],
            ['name' => 'Kalutara'],
            ['name' => 'Kandy'],
            ['name' => 'Kegalle'],
            ['name' => 'Kilinochchi'],
            ['name' => 'Kurunegala'],
            ['name' => 'Mannar'],
            ['name' => 'Matale'],
            ['name' => 'Matara'],
            ['name' => 'Monaragala'],
            ['name' => 'Mullaitivu'],
            ['name' => 'Nuwara Eliya'],
            ['name' => 'Polonnaruwa'],
            ['name' => 'Puttalam'],
            ['name' => 'Ratnapura'],
            ['name' => 'Trincomalee'],
            ['name' => 'Vavuniya']
        ];

        // Insert districts into the table
        DB::table('districts')->insert($districts);
    }
}

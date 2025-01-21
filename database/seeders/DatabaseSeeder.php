<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call(DistrictSeeder::class);

        DB::table('schools')->insert([
            [
                'name' => 'Example School',
                'email' => 'example@example.com',
                'contact_no' => '1234567890',
                'address_line_1' => '123 Example Street',
                'address_line_2' => 'Example City',
                'district_id' => 1, // Replace with a valid district_id
                'password' => Hash::make('password123'), // Replace with a secure password
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more entries as needed
        ]);

        DB::table('teachers')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'nic_no' => '123456789V',
                'email' => 'john.doe@example.com',
                'contact_no' => '9876543210',
                'password' => Hash::make('securepassword'), // Replace with a secure password
                'school_id' => 1, // Replace with a valid school_id
                'status' => 1, // Active status
                'verification_code' => 'abc123', // Example code, replace as needed
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more entries as needed
        ]);


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

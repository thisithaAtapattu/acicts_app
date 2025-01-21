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
                'district_id' => 1, 
                'password' => Hash::make('password123'), 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
           
        ]);

        DB::table('teachers')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'nic_no' => '123456789V',
                'email' => 'john.doe@example.com',
                'contact_no' => '9876543210',
                'password' => Hash::make('securepassword'), 
                'school_id' => 1, 
                'status' => 1, 
                'verification_code' => 'abc123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ]);


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

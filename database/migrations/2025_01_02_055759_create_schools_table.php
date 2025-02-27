<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->string(column: 'email')->unique();
            $table->string('contact_no',length: 12)->unique();
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->foreignId('district_id')->constrained(table: 'districts');
            $table->string(column: 'password');
            // $table->longText(column: 'verification_code')->default(null);
            // $table->tinyInteger(column: 'status')->default('2');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};

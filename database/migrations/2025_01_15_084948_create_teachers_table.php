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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string( 'first_name', 45);
            $table->string('last_name', length: 45);
            $table->string('nic_no', length: 13);

            $table->string('email', length: 300);
            $table->string('contact_no', length: 300);
            $table->longText('password');

            $table->foreignId('school_id')->constrained('schools')->onDelete("cascade");
            $table->unsignedInteger('status')->default(value: 1);
            $table->longText(column: 'verification_code');


            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

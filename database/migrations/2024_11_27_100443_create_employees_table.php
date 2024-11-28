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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('job_position');
            $table->date('date_of_birth');
            $table->string('phone_number');
            $table->string('email');
            $table->string('province');
            $table->string('city');
            $table->string('address');
            $table->string('zip_code');
            $table->string('ktp_number');
            $table->string('ktp_image');
            $table->string('bank_account');
            $table->string('bank_account_number');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

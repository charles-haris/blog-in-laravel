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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('First_name',25);
            $table->string('Last_name',50);
            $table->string('country',30)->nullable();
            $table->string('address',50)->nullable();
            $table->string('job',30)->nullable();
            $table->string('phone',30)->nullable();
            $table->string('email')->unique();
            $table->string('photo',100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

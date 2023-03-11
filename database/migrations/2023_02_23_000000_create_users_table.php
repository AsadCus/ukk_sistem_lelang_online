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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->foreign('petugas_id')->references('id')->on('petugas');
            $table->unsignedBigInteger('masyarakat_id')->nullable();
            $table->foreign('masyarakat_id')->references('id')->on('masyarakats');
            $table->enum('level', ['administrator', 'petugas', 'masyarakat']);
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

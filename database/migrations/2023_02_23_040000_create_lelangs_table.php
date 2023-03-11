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
        Schema::create('lelangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('barangs');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->foreign('petugas_id')->references('id')->on('petugas');
            $table->integer('final_price');
            $table->enum('status', ['active', 'inactive', 'close']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lelangs');
    }
};

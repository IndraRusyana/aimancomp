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
        Schema::create('job_topups', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('nomor_konsumen');
            $table->string('status');
            $table->integer('modal');
            $table->integer('harga_jual');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_topups');
    }
};

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
        Schema::create('job_jokis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tugas');
            $table->string('client');
            $table->text('deskripsi');
            $table->string('estimasi_pengerjaan');
            $table->string('status');
            $table->integer('harga');
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_jokis');
    }
};

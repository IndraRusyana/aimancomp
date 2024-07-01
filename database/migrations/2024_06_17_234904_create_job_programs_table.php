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
        Schema::create('job_programs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_project');
            $table->string('client');
            $table->text('deskripsi');
            $table->string('estimasi_waktu_pengerjaan');
            $table->text('input_dokumen'); // Atau jenis data lain sesuai kebutuhan
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
        Schema::dropIfExists('job_programs');
    }
};

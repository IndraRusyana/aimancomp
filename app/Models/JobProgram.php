<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobProgram extends Model
{
    use HasFactory;
    protected $fillable = ['nama_project', 'client', 'harga', 'deskripsi', 'estimasi_waktu_pengerjaan', 'input_dokumen', 'status', 'tanggal'];
}

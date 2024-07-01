<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobJoki extends Model
{
    use HasFactory;
    protected $fillable = ['nama_tugas', 'client', 'harga', 'deskripsi', 'estimasi_pengerjaan', 'status', 'tanggal'];
}

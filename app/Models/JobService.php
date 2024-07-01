<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobService extends Model
{
    use HasFactory;
    protected $fillable = ['merk', 'gambar', 'kondisi_masuk', 'keluhan', 'solusi', 'status', 'harga', 'tanggal'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSparepart extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'gambar', 'harga_awal', 'harga_jual', 'kualitas', 'jumlah', 'tanggal'];
}

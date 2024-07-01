<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTopup extends Model
{
    use HasFactory;
    protected $fillable = ['provider', 'modal', 'harga_jual', 'nomor_konsumen', 'status', 'tanggal'];
}

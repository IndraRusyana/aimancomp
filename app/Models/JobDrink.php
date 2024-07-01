<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDrink extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'modal', 'harga_jual', 'tanggal'];
}

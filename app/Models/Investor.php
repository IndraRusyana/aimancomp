<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'nik', 'foto_ktp', 'no_hp', 'jml_investasi', 'prsnt_investasi', 'doc_mou'];
}

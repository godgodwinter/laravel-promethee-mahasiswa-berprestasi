<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    public $table = "mahasiswa";
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
        'jk',
        'hp'
    ];
}

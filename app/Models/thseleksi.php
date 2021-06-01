<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thseleksi extends Model
{
    public $table = "thseleksi";
    use HasFactory;

    protected $fillable = [
        'tahun',
        'kuota',
        'status'
    ];
}

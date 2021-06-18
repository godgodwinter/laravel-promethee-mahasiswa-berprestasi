<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    public $table = "kriteria";
    use HasFactory;

    protected $fillable = [
        'nama',
        'nilai',
        'thseleksi_id'
    ];
}

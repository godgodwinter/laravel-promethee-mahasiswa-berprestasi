<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataproses extends Model
{
    public $table = "dataproses";
    use HasFactory;

    protected $fillable = [
        'nim',
        'thseleksi_id',
        'hasilhitung'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataprosesdetail extends Model
{
    public $table = "dataprosesdetail";
    use HasFactory;

    protected $fillable = [
        'nim',
        'thseleksi_id',
        'kriteriadetail_id',
        'bobot_kd',
        'kriteria_id'
    ];
}

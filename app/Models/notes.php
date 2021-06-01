<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    public $table = "notes";
    protected $guarded=[];
//untuk kayak pencarian berdasarkan field
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
    // use HasFactory;
   public function subject()
    {
        return $this->belongsTo(subject::class);
    }
}

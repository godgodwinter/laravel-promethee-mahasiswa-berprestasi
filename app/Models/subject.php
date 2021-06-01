<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{

    public $table = "subjects";
    protected $guarded=[];
   // use HasFactory;
   public function notes(){
    // return $this->hasMany(related:Note::class,foreignKey:'subject_id');
    return $this->hasMany(notes::class);
    }
}

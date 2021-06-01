<?php

namespace App\Http\Controllers\Notes;

use App\Models\subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class subjectController extends Controller
{
    public function index(){
        return subject::get();
    }
}

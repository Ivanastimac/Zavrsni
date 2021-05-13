<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class InstructionsController extends Controller
{
    public function index() {

        if (Auth::user()->permission == 'admin') {
            return view('instructions/instructions-admin');
        } else if (Auth::user()->permission == 'user') {
            return view('instructions/instructions-user');
        }
        
    }
}

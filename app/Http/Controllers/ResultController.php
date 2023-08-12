<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function index(){
        $data = [];
        $alternative = Alternative::with('criteria')->get();
        return view('testing.index', compact('criteria', 'highestValue'));
    }
}

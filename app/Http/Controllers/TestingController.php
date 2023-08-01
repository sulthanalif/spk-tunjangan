<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Sub;
use App\Models\Criteria;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index(){
        $data = [];
        $alternative = Alternative::get();
        $data[]=$alternative;
        $data = collect($data);

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->make(true);
    }
}

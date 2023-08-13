<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Alternative;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdatePenilaianRequest;
// use DB;

class PenilaianController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = Alternative::with('penilaian.sub')->get();
        $criterias = Criteria::with('sub')->orderBy('created_at','ASC')->get();
        // return response()->json($alternatives->penilaian[0]->sub_id);
        return view('penilaian.index', compact('alternatives', 'criterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request);
        try {
            DB::select('TRUNCATE penilaians');
           foreach($request->sub_id as $key => $value)
           {
            foreach($value as $key_1 => $value_1)
            {
                Penilaian::create([
                    'alternative_id' => $key,
                    'sub_id' => $value_1,
                ]);
            }
           }
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return redirect()->back()->with('success', 'Data Penilaian berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penilaian $penilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenilaianRequest $request, Penilaian $penilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penilaian $penilaian)
    {
        //
    }
}

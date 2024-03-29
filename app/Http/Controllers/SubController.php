<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use App\Models\Criteria;
use Illuminate\Http\Request;
use InvalidArgumentException;
use App\DataTables\SubDatatable;
use App\Http\Requests\SubRequest;
use Illuminate\Support\Facades\DB;


class SubController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     return view('sub.index', [
    //         'kriterias' => Criteria::all(),
    //     ]);
    // }
    public function index(SubDatatable $dataTable)
    {
       
            $kriterias = Criteria::with('sub')->get();
            // $subs = Sub::where('criteria_id', $kriterias->id)->first();
            return view('sub.index', compact('kriterias'));
        
        
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
    public function store()
    {

        try {
            DB::transaction(function () {

                request()->validate([
                    'keterangan' => 'required',
                    
                    'nilai' => 'required',
                ]); 
                Sub::create([
                    'criteria_id' => request('criteria_id'),
                    'keterangan' => request('keterangan'),
                    
                    'nilai' => request('nilai'),
                ]);

            });
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('message', $message);
        }

        return redirect()->back()->with('message', 'Data Sub Kriteria berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sub $sub)
    {
        //
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        try {
            $sub = Sub::findOrFail($id);
                request()->validate([
                    'keterangan' => 'required',
                    'nilai' => 'required',
                ]);

                $sub->update([
                    'keterangan' => request('keterangan'),
                    'nilai' => request('nilai'),
                ]);
        } catch (InvalidArgumentException $e) {
            $message = $e->getMessage();
            return redirect()->back()->with('message', $message);
        }

        return redirect()->back()->with('message', 'Data Sub Kriteria berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data berdasarkan ID
            $sub = Sub::findOrFail($id);
            
            if (!$sub) {
                return redirect()->route('subcriteria.index')->with('error', 'Data tidak ditemukan!');
            }
            $sub->delete();
            // Hapus data
            
    
            return redirect()->route('subcriteria.index')->with('message', 'Data berhasil dihapus!');
    }
}

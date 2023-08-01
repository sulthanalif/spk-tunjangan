<?php

namespace App\Http\Controllers;

use App\DataTables\karyawanDataTable;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(karyawanDataTable $dataTable)
    {
        return $dataTable->render('karyawan.index');
    }

    public function store(Request $request)
    {
        $itemId = request('item_id');

        try {
            DB::transaction(function () use ($itemId, $request) {

                $karyawan = $request->validated();

                Karyawan::updateOrCreate(['id' => $itemId], $karyawan);

            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Jenis barang berhasil disimpan',
        ]);
    }

    public function edit($karyawanId)
    {
        $karyawan = Karyawan::findOrFail($karyawanId);
        return response()->json($karyawan);
    }


    public function destroy($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            $karyawan->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Jenis barang berhasil dihapus',
        ]);
    }
}

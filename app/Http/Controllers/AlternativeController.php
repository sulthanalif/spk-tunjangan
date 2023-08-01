<?php

namespace App\Http\Controllers;

use App\DataTables\AlternativeDatatable;
use App\Http\Requests\AlternativeRequest;
use App\Models\Alternative;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AlternativeDatatable $dataTable)
    {
        return $dataTable->render('alternative.index');
    }

    public function store(AlternativeRequest $request)
    {
        $itemId = request('item_id');

        try {
            DB::transaction(function () use ($itemId, $request) {

                $alternative = $request->validated();

                $alternatives = [
                    'nama' => $alternative['nama'],
                    'absensi' => $alternative['absensi'],
                    'masa_kerja' => $alternative['masa_kerja'],
                    'sikap' => $alternative['sikap'],
                    'performa_kerja' => $alternative['performa_kerja'],
                    'kedisiplinan' => $alternative['kedisiplinan'],
                ];

                Alternative::updateOrCreate(['id' => $itemId], $alternatives);

            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Alternative berhasil disimpan',
        ]);
    }

    public function edit($alternativeId)
    {
        $alternative = Alternative::findOrFail($alternativeId);
        return response()->json($alternative);
    }


    public function destroy($id)
    {
        try {
            $Alternative = Alternative::findOrFail($id);
            $Alternative->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Alternative berhasil dihapus',
        ]);
    }
}

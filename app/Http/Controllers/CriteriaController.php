<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Status;
use App\Models\Criteria;
// use App\Models\Alternative;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use App\DataTables\CriteriaDatatable;
use App\Http\Requests\CriteriaRequest;

class CriteriaController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(CriteriaDatatable $dataTable)
    {
        return $dataTable->render('criteria.index', [
            'statues' => Status::get(),
            'types' => Type::get(),
        ]);
    }

    public function store(CriteriaRequest $request)
    {
        $itemId = request('item_id');

        try {
            DB::transaction(function () use ($itemId, $request) {

                $criteria = $request->validated();

                $criterias = [
                    'nama' => $criteria['nama'],
                    'status' => $criteria['status'],
                    'bobot' => $criteria['bobot'],
                    
                ];

                criteria::updateOrCreate(['id' => $itemId], $criterias);

            });
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

        return response()->json([
            'message' => 'Data Kriteria berhasil disimpan',
        ]);
    }

    public function edit($criteriaId)
    {
        $criteria = Criteria::findOrFail($criteriaId);
        return response()->json($criteria);
    }


    public function destroy($id)
    {
        try {
            $criteria = Criteria::findOrFail($id);
            $criteria->delete();
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
        return response()->json([
            'message' => 'Kriteria berhasil dihapus',
        ]);
    }
}

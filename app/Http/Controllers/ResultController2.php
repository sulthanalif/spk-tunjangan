<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Candidate;
use App\Models\Criteria;
use App\Models\CriteriaCrips;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $data = [];
        $alternative = Alternative::with('criteria')->get();
        $criteria = Criteria::get();
        $totalWeight = $criteria->sum('bobot');

        foreach ($alternative as $alter) {
            $alternativeData = [
                'name' => $alter->name,
            ];
            $R = 0;
            foreach ($criteria as $Criteria) {
                $idCriteria = Evaluation::where('Criteria_id', $Criteria->id)->pluck('Criteria;_crips_id')->toArray();
                $cripss = $alter->criteria->where('name', $Criteria->name)->pluck('pivot.Criteria_crips_id')->toArray();
                $CriteriaCrip = CriteriaCrips::whereIn('id', $cripss)->pluck('weight')->first();
                $attribute = $Criteria->attribute;
                // Normalisasi nilai berdasarkan kriteria benefit atau cost
                if ($attribute == 'Benefit') {
                    $getMax = CriteriaCrips::whereIn('id', $idCriteria)->max('weight');
                    $normalizedCrip = $CriteriaCrip / $getMax;
                } else {
                    $getMax = CriteriaCrips::whereIn('id', $idCriteria)->min('weight');
                    $normalizedCrip = $getMax / $CriteriaCrip;
                }

                // Pembulatan dua angka di belakang koma
                $normalizedCrip = round($normalizedCrip, 3);

                $result1 = $normalizedCrip * ($Criteria->weight / $totalWeight);
                $R += $result1;
            }
            $alternativeData['Vi'] = round($R, 4);
            $data[] = $alternativeData;
        }
        $datas = collect($data);
        $highestValue = $datas->sortByDesc('Vi')->first();
        $criteria = Criteria::all();
        return view('admin.result.index', compact('criteria', 'highestValue'));
    }

    public function getEmployee()
    {
        $data = [];
        $alternative = Alternative::with('criteria')->get();
        $criteria = Criteria::get();

        foreach ($alternative as $alter) {
            $alternativeData = [
                'name' => $alter->name,
            ];

            foreach ($criteria as $Criteria) {
//                $cripss = $alter->criteria->where('name', $Criteria->name)->pluck('pivot.Criteria_crips_id')->toArray();
                $cripss = $alter->criteria->where('name', $Criteria->name)->pluck('pivot.Criteria_crips_id')->toArray();
                if ($Criteria->type == 'Opsional') {
                    $CriteriaCrip = CriteriaCrips::whereIn('id', $cripss)->pluck('crips')->first();
                } else {
                    $CriteriaCrip = Evaluation::where('Criteria_crips_id', $cripss)->where('alternative_id', $alter->id)->pluck('value')->first();
                }
                $alternativeData[$Criteria->name] = $CriteriaCrip;
            }

            $data[] = $alternativeData;
        }
        $data = collect($data);
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function getValueRating()
    {
        $data = [];
        $alternative = Alternative::with('criteria')->get();
        $criteria = Criteria::get();

        foreach ($alternative as $alter) {
            $alternativeData = [
                'name' => $alter->name,
            ];

            foreach ($criteria as $Criteria) {
                $cripss = $alter->criteria->where('name', $Criteria->name)->pluck('pivot.Criteria_crips_id')->toArray();
                $CriteriaCrip = CriteriaCrips::whereIn('id', $cripss)->pluck('weight')->first();
                $alternativeData[$Criteria->name] = $CriteriaCrip;
            }

            $data[] = $alternativeData;
        }
        $data = collect($data);
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function getValueNormalize()
    {
        $data = [];
        $alternative = Alternative::with('criteria')->get();
        $criteria = Criteria::get();

        foreach ($alternative as $alter) {
            $alternativeData = [
                'name' => $alter->name,
            ];

            foreach ($criteria as $Criteria) {
                $idCriteria = Evaluation::where('Criteria_id', $Criteria->id)->pluck('Criteria_crips_id')->toArray();
                $cripss = $alter->criteria->where('name', $Criteria->name)->pluck('pivot.Criteria_crips_id')->toArray();
                $CriteriaCrip = CriteriaCrips::whereIn('id', $cripss)->pluck('weight')->first();
                $attribute = $Criteria->attribute;
                // Normalisasi nilai berdasarkan kriteria benefit atau cost
                if ($attribute == 'Benefit') {
                    $getMax = CriteriaCrips::whereIn('id', $idCriteria)->max('weight');
                    $normalizedCrip = $CriteriaCrip / $getMax;
                } else {
                    $getMax = CriteriaCrips::whereIn('id', $idCriteria)->min('weight');
                    $normalizedCrip = $getMax / $CriteriaCrip;
                }

                // Pembulatan dua angka di belakang koma
                $normalizedCrip = round($normalizedCrip, 2);

                $alternativeData[$Criteria->name] = $normalizedCrip;
            }
            $data[] = $alternativeData;
        }
        $data = collect($data);
        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function getValueResult()
    {
        $data = [];
        $alternative = Alternative::with('criteria')->get();
        $criteria = Criteria::get();
        $totalWeight = $criteria->sum('weight');

        foreach ($alternative as $alter) {
            $alternativeData = [
                'name' => $alter->name,
            ];
            $R = 0;
            foreach ($criteria as $Criteria) {
                $idCriteria = Evaluation::where('Criteria_id', $Criteria->id)->pluck('Criteria_crips_id')->toArray();
                $cripss = $alter->criteria->where('name', $Criteria->name)->pluck('pivot.Criteria_crips_id')->toArray();
                $CriteriaCrip = CriteriaCrips::whereIn('id', $cripss)->pluck('weight')->first();
                $attribute = $Criteria->attribute;
                // Normalisasi nilai berdasarkan kriteria benefit atau cost
                if ($attribute == 'Benefit') {
                    $getMax = CriteriaCrips::whereIn('id', $idCriteria)->max('weight');
                    $normalizedCrip = $CriteriaCrip / $getMax;
                } else {
                    $getMax = CriteriaCrips::whereIn('id', $idCriteria)->min('weight');
                    $normalizedCrip = $getMax / $CriteriaCrip;
                }

                // Pembulatan dua angka di belakang koma
//                $normalizedCrip = round($normalizedCrip, 4);

                $result1 = $normalizedCrip * ($Criteria->weight / $totalWeight);
                $R += $result1;
            }
            $alternativeData['Vi'] = round($R, 4);
            $data[] = $alternativeData;
        }
        return json_encode(['data' => $data]);
    }
}

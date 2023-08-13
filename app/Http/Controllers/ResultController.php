<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Sub;
// use Barryvdh\DomPDF\PDF;
use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Alternative;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ResultController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }
    public function calculateTunjangan($score)
    {
        if ($score > 85) {
            return '30% Gaji Pokok';
        } elseif ($score >= 70 && $score <= 84) {
            return '20% Gaji Pokok';
        } elseif ($score >= 50 && $score <= 69) {
            return '10% Gaji Pokok';
        } else {
            return 'Tidak Mendapatkan Tunjangan';
        }
    }
    public function index(){

          // Ambil data alternatif, kriteria, penilaian, dan sub kriteria
          $alternatives = Alternative::with('penilaian.sub')->get();
          $criterias = Criteria::with('sub')->orderBy('created_at', 'ASC')->get();
          $penilaians = Penilaian::with('sub')->get();
          $subKriterias = Sub::all();
  
          // Hitung normalisasi
          $normalisasi = [];
          foreach ($alternatives as $alternative) {
              $alternativeName = $alternative->nama;
              $normalisasi[$alternativeName] = [];
              foreach ($criterias as $criteria) {
                  $criteriaId = $criteria->id;
                  $maxValue = $subKriterias->where('criteria_id', $criteriaId)->max('nilai');
                  $penilaian = $penilaians->where('alternative_id', $alternative->id)
                                          ->where('sub.criteria_id', $criteriaId)
                                          ->first();
                  if ($penilaian) {
                      $normalizedValue = $penilaian->sub->nilai / $maxValue;
                      $normalisasi[$alternativeName][$criteriaId] = $normalizedValue;
                  }
              }
          }

          
          // Hitung hasil akhir (total skor SAW)
          $sawScores = [];
          foreach ($alternatives as $alternative) {
              $alternativeName = $alternative->nama;
              $sawScores[$alternativeName] = 0;
              foreach ($criterias as $criteria) {
                  $criteriaId = $criteria->id;
                  $weight = $criteria->bobot;
                  $normalizedValue = $normalisasi[$alternativeName][$criteriaId] ?? 0;
                  $sawScores[$alternativeName] += ($weight * $normalizedValue);
                }
            }

            // Perhitungan perankingan
             $rankings = [];
             arsort($sawScores); // Urutkan skor SAW dari tertinggi ke terendah
             $rank = 1;
             foreach ($sawScores as $alternative => $score) {
                 $rankings[] = [
                     'rank' => $rank,
                     'alternative' => $alternative,
                     'score' => $score,
                     'tunjangan' => $this->calculateTunjangan($score),
                 ];
                 $rank++;
             }


            
          // Kembali ke view dengan data hasil normalisasi dan hasil akhir (sawScores)
          return view('result.index', compact('criterias', 'alternatives', 'normalisasi', 'sawScores', 'rankings'));
        
        // $alternatives = Alternative::with('penilaian.sub')->get();
        // $criterias = Criteria::with('sub')->orderBy('created_at','ASC')->get();
        // $penilaians = Penilaian::with('sub', 'alternative')->get();
        // if(count($penilaians) == 0){

        // } 

        // //mencari min max
        // foreach ($criterias as $key => $value){
        //     foreach ($penilaians as $k => $v){
        //         if  ($value->id== $v->sub->criteria_id){
        //             if ($value->status == 1){
        //                 $minMax[$value->id] = $v->sub->nilai;
        //             }else {
        //                 $minMax[$value->id] = $v->sub->nilai;
        //             }
        //         }
        //     }
        // }

        // //normalisasi
        // foreach ($penilaians as $k => $v){
        //     foreach ($criterias as $key => $value){
        //         if ($value->id == $v->sub->criteria_id){
        //             if ($value->status == 1){
        //                 $normalisasi[$v->alternative->nama][$value->id] = $v->sub->nilai / max($minMax[$value->id]);
        //             } else{
        //                 $normalisasi[$v->alternative->nama][$value->id] = min($minMax[$value->id]) / $v->sub->nilai;
        //             }
        //         }
        //     }
        // }


        
        // return view('result.index', compact('criterias', 'alternatives'));
    }
    public function printData()
{
    // ... (kode perhitungan yang telah ada sebelumnya)
     // Ambil data alternatif, kriteria, penilaian, dan sub kriteria
     $alternatives = Alternative::with('penilaian.sub')->get();
     $criterias = Criteria::with('sub')->orderBy('created_at', 'ASC')->get();
     $penilaians = Penilaian::with('sub')->get();
     $subKriterias = Sub::all();

       // Hitung normalisasi
       $normalisasi = [];
       foreach ($alternatives as $alternative) {
           $alternativeName = $alternative->nama;
           $normalisasi[$alternativeName] = [];
           foreach ($criterias as $criteria) {
               $criteriaId = $criteria->id;
               $maxValue = $subKriterias->where('criteria_id', $criteriaId)->max('nilai');
               $penilaian = $penilaians->where('alternative_id', $alternative->id)
                                       ->where('sub.criteria_id', $criteriaId)
                                       ->first();
               if ($penilaian) {
                   $normalizedValue = $penilaian->sub->nilai / $maxValue;
                   $normalisasi[$alternativeName][$criteriaId] = $normalizedValue;
               }
           }
       }

       
       // Hitung hasil akhir (total skor SAW)
       $sawScores = [];
       foreach ($alternatives as $alternative) {
           $alternativeName = $alternative->nama;
           $sawScores[$alternativeName] = 0;
           foreach ($criterias as $criteria) {
               $criteriaId = $criteria->id;
               $weight = $criteria->bobot;
               $normalizedValue = $normalisasi[$alternativeName][$criteriaId] ?? 0;
               $sawScores[$alternativeName] += ($weight * $normalizedValue);
             }
         }

         // Perhitungan perankingan
          $rankings = [];
          arsort($sawScores); // Urutkan skor SAW dari tertinggi ke terendah
          $rank = 1;
          foreach ($sawScores as $alternative => $score) {
              $rankings[] = [
                  'rank' => $rank,
                  'alternative' => $alternative,
                  'score' => $score,
                  'tunjangan' => $this->calculateTunjangan($score),
              ];
              $rank++;
          }

    // Kembali ke view cetak dengan data hasil perhitungan
    $pdf = PDF::loadview('result.print',[
        'alternatives' => $alternatives,
        'criterias' => $criterias,
        'normalisasi' => $normalisasi,
        'sawScores' => $penilaians,
        'rankings' => $rankings,
    ]);
    	return $pdf->download('Laporan-Tunjangan-'.now()->format('Y-m-d').'.pdf');
    // return view('result.print', compact('criterias', 'alternatives', 'normalisasi', 'sawScores', 'rankings'));

}
   
}

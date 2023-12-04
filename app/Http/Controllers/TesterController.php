<?php

namespace App\Http\Controllers;

use App\Classes\NaiveBayes;
use App\Models\DataBalita;
use App\Models\Tester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Tester::truncate();
        $data = DataBalita::all()->count();
        return view('uji_klasifikasi.index', compact('data'));
    }

    public function process(Request $request)
    {
        $hasil = [];
        $data_testing = $request->total_data - $request->training;
        $data_latih = DataBalita::skip($request->training)->limit($data_testing)->get();
        $naiveBayes = new NaiveBayes();

        foreach ($data_latih as $value) {
            $hasil[] = ["id_data_balita" => $value->id, "hasil" => $naiveBayes->klasifikasi($value->jk, $value->umur, $value->berat_badan, $value->tinggi_badan)];
        }

        foreach ($hasil as $value) {
            Tester::create($value);
        }
        return redirect(route('uji.hasil'));
    }

    public function hasil()
    {
        $data = Tester::with('dataBalita')->get();
        $true_positif = 0;
        $true_negatif = 0;
        $false_positif = 0;
        $false_negatif = 0;

        Log::debug($data);

        foreach ($data as $item) {
            if ($item->dataBalita->status === "STUNTING") {
                if ($item->hasil === $item->dataBalita->status) {
                    $true_positif += 1;
                } else {
                    $false_positif += 1;
                }
            } else {
                if ($item->hasil === $item->dataBalita->status) {
                    $true_negatif += 1;
                } else {
                    $false_negatif += 1;
                }
            }
        }
        $allData = Tester::with('dataBalita')->paginate(20);
        $akurasi = $true_positif + $true_negatif / ($true_positif + $true_negatif + $false_positif + $false_negatif) * 100;

        return view('uji_klasifikasi.hasil', compact('allData', 'akurasi'));
    }
}

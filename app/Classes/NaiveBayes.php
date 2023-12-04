<?php

namespace App\Classes;

use App\Models\DataBalita;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NaiveBayes
{
    public function klasifikasi($jk, $umur, $berat_badan, $tinggi_badan)
    {
        $input = [
            "jk" => $jk,
            "umur" => $umur,
            "berat_badan" => $berat_badan,
            "tinggi_badan" => $tinggi_badan,
        ];

        $kriteria = [
            "jk",
            "umur",
            "berat_badan",
            "tinggi_badan"
        ];

        $hasil = "status";
        $hasil_value = ["NORMAL", "STUNTING"];
        $select = implode(',', [...$kriteria, $hasil]);
        $data_train = DB::table('data_balita')->selectRaw($select)->get();

        $data_train_normal = [];
        foreach ($data_train as $value) {
            $data = [];
            $data['jk'] = $value->jk;
            $data['umur'] = $value->umur;
            $data['berat_badan'] = $value->berat_badan;
            $data['tinggi_badan'] = $value->tinggi_badan;
            $data['status'] = $value->status;
            $data_train_normal[] = $data;
        }

        $prob_true = [];
        $prob_false = [];
        foreach ($kriteria as $value) {
            $prob_true[] = $this->getProbabilities($data_train_normal, [
                $value => $input[$value],
                $hasil => $hasil_value[1]
            ]);

            $prob_false[] = $this->getProbabilities($data_train_normal, [
                $value => $input[$value],
                $hasil => $hasil_value[0]
            ]);
        }

        $prob_hasil_true = $this->getProbabilities($data_train_normal, [
            $hasil => $hasil_value[1]
        ]);

        $prob_hasil_false = $this->getProbabilities($data_train_normal, [
            $hasil => $hasil_value[0]
        ]);

        $hasil = [
            number_format(array_product($prob_true) * $prob_hasil_true, 10),
            number_format(array_product($prob_false) * $prob_hasil_false, 10)
        ];

        // dd($kriteria, $prob_true, $prob_hasil_true, $prob_false, $prob_hasil_false, $hasil);

        $status = ($hasil[0] >= $hasil[1]) ? $hasil_value[1] : $hasil_value[0];

        return $status;
    }

    /**
     * $data - data balita normal,
     * $rules - data yang akan diuji
     */
    private function getProbabilities($data, $rules)
    {
        $hasil = 0;
        foreach ($data as $v) {
            $iya = 0;
            foreach ($rules as $y => $value) {
                if ($v[$y] == $value) $iya += 1;
                else $iya -= 1;
            }
            $hasil += ($iya == count($rules)) ? 1 : 0;
        }

        return $hasil / count($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\DataBalita;
use App\Classes\NaiveBayes;
use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{

    public function index()
    {
        return view('klasifikasi.index');
    }

    public function list()
    {
        $data = Klasifikasi::paginate(20);
        return view('klasifikasi.list', compact('data'));
    }


    public function klasifikasiaksi(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jk' => 'required',
            'umur' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
        ]);

        $naiveBayes = new NaiveBayes();
        $status = $naiveBayes->klasifikasi($request->jk, $request->umur, $request->berat_badan, $request->tinggi_badan);

        $data = Klasifikasi::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'status' => $status
        ]);

        return redirect()->route('klasifikasi.list')->with('success', 'data berhasil ditambahkan');
    }

    public function edit($balita_id)
    {
        $databalita = Klasifikasi::find($balita_id);
        return view('klasifikasi.edit', compact('databalita'));
    }

    public function update(Request $request, $balita_id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jk' => 'required',
            'umur' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
        ]);

        $naiveBayes = new NaiveBayes();
        $status = $naiveBayes->klasifikasi($request->jk, $request->umur, $request->berat_badan, $request->tinggi_badan);

        $data = Klasifikasi::find($balita_id);
        $data->update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'status' => $status
        ]);

        return redirect()->route('klasifikasi.list')->with('success', 'data berhasil diubah');
    }

    public function destroy($id)
    {
        $databalita = Klasifikasi::findOrFail($id);
        $databalita->delete();
        return redirect(route('klasifikasi.list'))->with('success', 'Data Balita berhasil dihapus');
    }

    public function destoryall()
    {
        Klasifikasi::truncate();
        return redirect(route('klasifikasi.list'))->with('success', 'Data Balita berhasil dihapus');
    }
}

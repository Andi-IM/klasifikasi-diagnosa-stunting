<?php

namespace App\Http\Controllers;

use App\Jobs\DataBayiJob;
use App\Models\DataBalita;
use Illuminate\Http\Request;

class DataBalitaController extends Controller
{

    public function index()
    {
        $databalita = DataBalita::paginate('20');
        return view('data_balita.index', compact('databalita'));
    }


    public function create()
    {
        return view('data_balita.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:200',
            'jk' => 'required',
            'umur' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'status' => 'required',
        ]);

        DataBalita::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'status' => $request->status,
        ]);
        return redirect()->route('balita.index')->with('pesan', 'Data berhasil disimpan');
    }

    public function massUploadForm()
    {
        return view('data_balita.bulk');
    }

    public function massUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-data-bayi.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $filename);
            DataBayiJob::dispatch($filename);
            return redirect()->back()->with(['success' => 'Import Data Bayi Dijadwalkan!']);
        }
    }

    public function edit($balita_id)
    {
        $databalita = DataBalita::find($balita_id);
        Log::debug($databalita);
        return view('data_balita.edit', compact('databalita'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:200|unique:nama,jk,umur,berat_badan,tinggi_badan,status,' . $id
        ]);

        $data = DataBalita::find($id);
        $data->update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'umur' => $request->umur,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'status' => $request->status,
        ]);

        return redirect(route('balita.index'))->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $databalita = DataBalita::findOrFail($id);
        $databalita->delete();
        return redirect(route('balita.index'))->with('success', 'Data Balita berhasil dihapus');
    }
}

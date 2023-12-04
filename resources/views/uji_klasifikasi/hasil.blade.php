@extends('layouts.app')
@section('title', 'Hasil Uji Klasifikasi')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Data Deteksi</li>
    </ol>
    <div class="col-lg-12">
        <h1>Akurasi {{ $akurasi }}%</h1>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Deteksi</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Berat Badan</th>
                                <th scope="col">Tinggi Badan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($allData as $item)
                                <?php $dataBalita = $item->dataBalita; ?>
                                <tr data-id="{{ $item->id }}">
                                    <td>{{ ($allData->currentpage() - 1) * $allData->perPage() + $loop->iteration }}</td>
                                    <td>{{ $dataBalita->nama }}</td>
                                    <td>{{ $dataBalita->jk }}</td>
                                    <td>{{ $dataBalita->umur }}</td>
                                    <td>{{ $dataBalita->berat_badan }}</td>
                                    <td>{{ $dataBalita->tinggi_badan }}</td>
                                    <td>{{ $dataBalita->status }}</td>
                                    <td>{{ $item->hasil }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {!! $allData->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

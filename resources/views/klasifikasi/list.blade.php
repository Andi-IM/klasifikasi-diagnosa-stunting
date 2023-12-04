@extends('layout.app')
@section('title', 'List Klasifikasi')

@section('content')
    <div class="col-lg-12 margin-tb">
        <a href="{{ route('klasifikasi') }}" class="btn btn-primary btn-sm">Buat Klasifikasi</a>
        <a href="{{ route('klasifikasi.destroyall') }}" class="btn btn-danger btn-sm">Hapus Semua Data Klasifikasi</a><br><br>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Testing</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered verticle-middle table-responsive-sm">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Berat Badan</th>
                                <th scope="col">Tinggi Badan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($data as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jk }}</td>
                                    <td>{{ $item->umur }}</td>
                                    <td>{{ $item->berat_badan }}</td>
                                    <td>{{ $item->tinggi_badan }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ date('d F Y H:i A', strtotime($item->updated_at)) }}</td>
                                    <td>
                                        <form action="{{ route('klasifikasi.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('klasifikasi.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

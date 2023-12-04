@extends('layout.app')
@section('title', 'Data Balita')

@section('content')
    <div class="col-lg-12 margin-tb">
        <div class="row-lg-10">
            <a href="{{ route('balita.create') }}" class="btn btn-primary btn-sm">Tambah Data Balita</a>
            <a href="{{ route('balita.bulk') }}" class="btn btn-secondary btn-sm">Import Data Balita</a>
            <br><br>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Balita</h4>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
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
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($databalita as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>{{ ($databalita->currentpage() - 1) * $databalita->perPage() + $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->jk }}</td>
                                    <td>{{ $item->umur }}</td>
                                    <td>{{ $item->berat_badan }}</td>
                                    <td>{{ $item->tinggi_badan }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <form action="{{ route('balita.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('balita.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    {!! $databalita->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

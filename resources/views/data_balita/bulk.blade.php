@extends('layouts.app')
@section('title', 'Import Data Balita')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Data Balita</li>
    </ol>

    <form action="{{ route('balita.saveBulk') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Import Data Bayi</h4>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="form-group">
                        <label for="file">File Excel</label>
                        <input type="file" name="file" class="form-control" value="{{ old('file') }}" required>
                        <p class="text-danger">{{ $errors->first('file') }}</p>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

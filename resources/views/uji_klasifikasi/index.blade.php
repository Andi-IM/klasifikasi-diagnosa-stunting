@extends('layouts.app')
@section('title', 'Uji Klasifikasi')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Pengujian Naive Bayes</li>
    </ol>

    <div class="content">
        <div class="col-lg-12 margin-tb">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pengujian Naive Bayes</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('uji.process') }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Total Data</label>
                            <div class="col-sm-6">
                                <input name="total_data" class="form-control" value="{{ $data }}" disabled>
                                <input type="hidden" name="total_data" class="form-control" value="{{ $data }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Data Latih</label>
                            <div class="col-sm-6">
                                <input name="training" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

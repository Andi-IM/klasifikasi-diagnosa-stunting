@extends('layouts.app')
@section('title', 'Klasifikasi')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Klasifikasi Diagnosa Stunting</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Klasifikasi Diagnosa Stunting</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form action="{{ route('klasifikasiaksi') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="nama">Nama</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="nama">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="jk">Jenis Kelamin</label>
                                            <div class="col-lg-6">
                                                <select name="jk" class="form-control">
                                                    <option value="L" {{ old('jk') == 'L' ? 'selected' : '' }}>
                                                        Laki-Laki </option>
                                                    <option value="P" {{ old('jk') == 'P' ? 'selected' : '' }}>
                                                        Perempuan</option>
                                                </select>
                                                <p class="text-danger">{{ $errors->first('jk') }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="umur">Umur</label>
                                            <div class="col-lg-6">
                                                <select name="umur" class="form-control">
                                                    <option selected disabled>--</option>
                                                    <option value="BAYI" {{ old('umur') == 'BAYI' ? 'selected' : '' }}>
                                                        Bayi (Kurang dari 12 Bulan)
                                                    </option>
                                                    <option value="ANAK" {{ old('umur') == 'ANAK' ? 'selected' : '' }}>
                                                        Anak (Lebih dari 12 bulan)</option>
                                                </select>
                                                <p class="text-danger">{{ $errors->first('umur') }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="berat_badan">Berat Badan</label>
                                            <div class="col-lg-6">
                                                <select name="berat_badan" class="form-control">
                                                    <option selected disabled>--</option>
                                                    <option value="RENDAH"
                                                        {{ old('berat_badan') == 'RENDAH' ? 'selected' : '' }}>
                                                        Rendah (Kurang dari 2,5 KG)
                                                    </option>
                                                    <option value="NORMAL"
                                                        {{ old('berat_badan') == 'NORMAL' ? 'selected' : '' }}>
                                                        Normal (2,5 KG sampai 4 KG)</option>
                                                    <option value="LEBIH"
                                                        {{ old('berat_badan') == 'LEBIH' ? 'selected' : '' }}>
                                                        Lebih (Lebih dari 4 KG)</option>
                                                </select>
                                                <p class="text-danger">{{ $errors->first('berat_badan') }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Tinggi Badan</label>
                                            <div class="col-lg-6">
                                                <select name="tinggi_badan" class="form-control">
                                                    <option selected disabled>--</option>
                                                    <option value="PENDEK"
                                                        {{ old('tinggi_badan') == 'PENDEK' ? 'selected' : '' }}>
                                                        Pendek (Kurang dari 85 CM)
                                                    </option>
                                                    <option value="NORMAL"
                                                        {{ old('tinggi_badan') == 'NORMAL' ? 'selected' : '' }}>
                                                        Normal (85 CM sampai 110 CM)</option>
                                                    <option value="TINGGI"
                                                        {{ old('tinggi_badan') == 'TINGGI' ? 'selected' : '' }}>
                                                        Tinggi (Lebih dari 110 CM)</option>
                                                </select>
                                                <p class="text-danger">{{ $errors->first('tinggi_badan') }}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Proses</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('title', 'Tambah Data Balita')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Tambah Data Balita</li>
    </ol>
    <form action="{{ route('balita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="col-sm-6">
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label">Nama</label>
                    <div class="col-lg-6">
                        <input name="nama" class="form-control
                    @error('nama') is invalid @enderror"
                            required>
                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="jk">Jenis Kelamin</label>
                    <div class="col-lg-6">
                        <select name="jk" class="form-control">
                            <option selected disabled>--</option>
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
                            <option value="RENDAH" {{ old('berat_badan') == 'RENDAH' ? 'selected' : '' }}>
                                Rendah (Kurang dari 2,5 KG)
                            </option>
                            <option value="NORMAL" {{ old('berat_badan') == 'NORMAL' ? 'selected' : '' }}>
                                Normal (2,5 KG sampai 4 KG)</option>
                            <option value="LEBIH" {{ old('berat_badan') == 'LEBIH' ? 'selected' : '' }}>
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
                            <option value="PENDEK" {{ old('tinggi_badan') == 'PENDEK' ? 'selected' : '' }}>
                                Pendek (Kurang dari 85 CM)
                            </option>
                            <option value="NORMAL" {{ old('tinggi_badan') == 'NORMAL' ? 'selected' : '' }}>
                                Normal (85 CM sampai 110 CM)</option>
                            <option value="TINGGI" {{ old('tinggi_badan') == 'TINGGI' ? 'selected' : '' }}>
                                Tinggi (Lebih dari 110 CM)</option>
                        </select>
                        <p class="text-danger">{{ $errors->first('tinggi_badan') }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="jk">Status</label>
                    <div class="col-lg-6">
                        <select name="status" class="form-control">
                            <option selected disabled>--</option>
                            <option value="NORMAL" {{ old('status') == 'NORMAL' ? 'selected' : '' }}>
                                Normal </option>
                            <option value="STUNTING" {{ old('status') == 'STUNTING' ? 'selected' : '' }}>
                                Stunting </option>
                        </select>
                        <p class="text-danger">{{ $errors->first('status') }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <a href="{{ route('balita.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@extends('layouts.admin')

@section('title', 'Tambah Peserta')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Tambah Peserta Baru</h4>
                    <a href="{{ route('admin.participants.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="basic-form p-4">
                    <form action="{{ route('admin.participants.store') }}" method="POST">
                        @csrf

                        <div class="form-group row mb-3">
                            <div class="col-md-6 mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="Masukkan email" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 mb-3">
                                <label>No. HP</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ old('phone') }}" placeholder="Masukkan nomor HP" required>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                    <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fa fa-save"></i> Simpan
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
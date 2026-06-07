@extends('layouts.admin')

@section('title', 'Edit Peserta')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Edit Data Peserta</h4>
                    <a href="{{ route('admin.participants.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="basic-form p-4">
                    <form action="{{ route('admin.participants.update', $participant->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-3">
                            <div class="col-md-6 mb-3">
                                <label>Nama Lengkap</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $participant->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $participant->email) }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 mb-3">
                                <label>No. HP</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ old('phone', $participant->phone) }}" required>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Jenis Kelamin</label>
                                @php $rawJK = $participant->getRawOriginal('jenis_kelamin'); @endphp
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="L" {{ (old('jenis_kelamin', $rawJK) === 'L') ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="P" {{ (old('jenis_kelamin', $rawJK) === 'P') ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fa fa-save"></i> Simpan Perubahan
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@extends('layouts.admin')

@section('title', 'Tambah Jadwal')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Tambah Jadwal Baru</h4>

                    <a href="{{ route('admin.schedules.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="basic-form p-4">
                    <form action="{{ route('admin.schedules.store') }}" method="POST">
                        @csrf

                        <div class="form-group row mb-3">

                            <div class="col-md-6 mb-3">
                                <label>Judul Jadwal</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>

                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Tanggal Kegiatan</label>

                                <input type="date" name="day" class="form-control" value="{{ old('day') }}" required>

                                @error('day')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row mb-3">

                            <div class="col-md-6 mb-3">
                                <label>Jam</label>
                                <input type="time" name="time" class="form-control" value="{{ old('time') }}" required>

                                @error('time')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Status</label>

                                <select name="status" class="form-control" required>
                                    <option value="upcoming">Upcoming</option>
                                    <option value="ongoing">Ongoing</option>
                                    <option value="ended">Ended</option>
                                </select>

                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group mb-3">
                            <label>Aktivitas</label>

                            <textarea name="activity" rows="4" class="form-control"
                                required>{{ old('activity') }}</textarea>

                            @error('activity')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
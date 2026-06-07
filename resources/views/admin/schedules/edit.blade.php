@extends('layouts.admin')

@section('title', 'Edit Jadwal')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Edit Jadwal</h4>

                <a href="{{ route('admin.schedules.index') }}"
                   class="btn btn-primary btn-sm">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="basic-form p-4">

                <form action="{{ route('admin.schedules.update', $schedule->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group row mb-3">

                        <div class="col-md-6 mb-3">
                            <label>Judul Jadwal</label>

                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   value="{{ old('title', $schedule->title) }}"
                                   required>
                        </div>

                    <div class="col-md-6 mb-3">
                        <label>Tanggal Kegiatan</label>

                        <input type="date"
                            name="day"
                            class="form-control"
                            value="{{ old('day', $schedule->day) }}"
                            required>

                        @error('day')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group row mb-3">

                        <div class="col-md-6 mb-3">
                            <label>Jam</label>

                            <input type="time"
                                   name="time"
                                   class="form-control"
                                   value="{{ old('time', $schedule->time) }}"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Status</label>

                            <select name="status" class="form-control" required>

                                <option value="upcoming"
                                    {{ old('status',$schedule->status) == 'upcoming' ? 'selected' : '' }}>
                                    Upcoming
                                </option>

                                <option value="ongoing"
                                    {{ old('status',$schedule->status) == 'ongoing' ? 'selected' : '' }}>
                                    Ongoing
                                </option>

                                <option value="ended"
                                    {{ old('status',$schedule->status) == 'ended' ? 'selected' : '' }}>
                                    Ended
                                </option>

                            </select>
                        </div>

                    </div>

                    <div class="form-group mb-3">
                        <label>Aktivitas</label>

                        <textarea name="activity"
                                  rows="4"
                                  class="form-control"
                                  required>{{ old('activity', $schedule->activity) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning float-right">
                        <i class="fa fa-save"></i> Update
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>

@endsection
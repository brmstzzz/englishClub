@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Edit Event</h4>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <div class="basic-form p-4">
                    <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-3">
                            <div class="col-md-6 mb-3">
                                <label>Judul Event</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $event->title) }}" placeholder="Masukkan judul event" required>

                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Tanggal Event</label>
                                <input type="date" name="date" class="form-control" value="{{ old('date', $event->date) }}"
                                    required>

                                @error('date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Deskripsi Event</label>
                            <textarea name="description" rows="5" class="form-control"
                                placeholder="Masukkan deskripsi event"
                                required>{{ old('description', $event->description) }}</textarea>

                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Status Event</label>

                            <select name="status" class="form-control" required>

                                <option value="upcoming" {{ old('status', $event->status) == 'upcoming' ? 'selected' : '' }}>
                                    Upcoming
                                </option>

                                <option value="ongoing" {{ old('status', $event->status) == 'ongoing' ? 'selected' : '' }}>
                                    Ongoing
                                </option>

                                <option value="ended" {{ old('status', $event->status) == 'ended' ? 'selected' : '' }}>
                                    Ended
                                </option>

                            </select>

                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
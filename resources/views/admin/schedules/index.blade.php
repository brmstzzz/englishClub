@extends('layouts.admin')

@section('title', 'Data Jadwal')

@section('content')

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Data Jadwal</h4>

            <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i> Tambah Jadwal
            </a>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Aktivitas</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($schedules as $schedule)

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $schedule->title }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($schedule->day)->translatedFormat('d F Y') }}
                                </td>

                                <td>{{ date('H:i', strtotime($schedule->time)) }}</td>

                                <td>{{ $schedule->activity }}</td>

                                <td>

                                    @if($schedule->status == 'upcoming')
                                        <span class="badge badge-info">Upcoming</span>

                                    @elseif($schedule->status == 'ongoing')
                                        <span class="badge badge-success">Ongoing</span>

                                    @else
                                        <span class="badge badge-danger">Ended</span>
                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST"
                                        style="display:inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </form>

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center">
                                    Belum ada data jadwal.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
@extends('layouts.admin') @section('content')
<div class="container">
    <h2>Pendaftar Jadwal: {{ $schedule->title }}</h2>
    <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peserta</th>
                        <th>No. Telepon / WA</th>
                        <th>Tanggal Join</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($participants as $key => $p)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->phone }}</td>
                        <td>{{ $p->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada peserta yang bergabung di jadwal ini.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
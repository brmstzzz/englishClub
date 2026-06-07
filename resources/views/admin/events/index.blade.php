@extends('layouts.admin')

@section('title', 'Data Event')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Data Event</h4>

            <a href="{{ route('admin.events.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Tambah Event
            </a>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Judul Event</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($events as $event)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $event->title }}</td>

                                <td>
                                    {{ Str::limit($event->description, 80) }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                </td>

                                <td>
                                    @if($event->status == 'upcoming')
                                        <span class="badge badge-info">
                                            Upcoming
                                        </span>
                                    @elseif($event->status == 'ongoing')
                                        <span class="badge badge-warning">
                                            Ongoing
                                        </span>
                                    @else($event->status == 'ended')
                                        <span class="badge badge-danger">
                                            Ended
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.events.edit', $event->id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.events.destroy', $event->id) }}"
                                          method="POST"
                                          style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus event ini?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    Belum ada data event.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

    </div>
</div>

</div>
@endsection

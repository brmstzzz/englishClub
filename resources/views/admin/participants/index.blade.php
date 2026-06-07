@extends('layouts.admin')

@section('title', 'Data Partisipan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Data Partisipan</h4>
                        <a href="{{ route('admin.participants.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </a>
                    </div>

                    {{-- Show entries & search --}}
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <div class="d-flex align-items-center">
                            <span class="mr-2">Show</span>
                            <form method="GET" style="display:inline">
                                <select name="per_page" class="form-control form-control-sm" onchange="this.form.submit()">
                                    <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                    <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                                </select>
                            </form>
                            <span class="ml-2">entries</span>
                        </div>

                        <form method="GET" class="d-flex align-items-center">
                            <label class="mr-2 mb-0">Search:</label>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="form-control form-control-sm" placeholder="Cari nama/email...">
                            <input type="hidden" name="per_page" value="{{ request('per_page', 10) }}">
                        </form>
                    </div>

                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. HP</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($participants as $i => $p)
                                <tr>
                                    <td>{{ $participants->firstItem() + $i }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->phone }}</td>
                                    <td>{{ $p->jenis_kelamin }}</td>
                                    <td>
                                        <a href="{{ route('admin.participants.edit', $p->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>

                                        <form action="{{ route('admin.participants.destroy', $p->id) }}"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Hapus peserta ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada peserta.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small class="text-muted">
                            Showing {{ $participants->firstItem() }} to {{ $participants->lastItem() }}
                            of {{ $participants->total() }} entries
                        </small>
                        {{ $participants->appends(request()->query())->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
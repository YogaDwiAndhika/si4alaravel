@extends('layout.main')
@section('title', 'Fakultas')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Daftar Fakultas</h3>
                    <a href="{{ route('fakultas.create') }}" class="btn btn-primary btn-sm">Tambah Fakultas</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Singkatan</th>
                                    <th>Dekan</th>
                                    <th>Wakil Dekan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($fakultas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->singkatan }}</td>
                                        <td>{{ $item->dekan }}</td>
                                        <td>{{ $item->wakil_dekan }}</td>
                                        <td>
                                            <a href="{{ route('fakultas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('fakultas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='delete' data-nama='{{ $item->nama }}'>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data fakultas belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <small>Data Fakultas &copy; {{ date('Y') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layout.main')
@section('title', 'Prodi')

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
                    <h3 class="card-title mb-0">Daftar Prodi</h3>
                    <a href="{{ route('prodi.create') }}" class="btn btn-primary btn-sm">Tambah Prodi</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Singkatan</th>
                                    <th>Kaprodi</th>
                                    <th>Sekretaris</th>
                                    <th>Fakultas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($prodi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->singkatan }}</td>
                                        <td>{{ $item->kaprodi }}</td>
                                        <td>{{ $item->sekprodi }}</td>
                                        <td>{{ $item->fakultas->nama }}</td>
                                        <td>
                                            <a href="{{ route('prodi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('prodi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data prodi belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <small>Data Prodi &copy; {{ date('Y') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
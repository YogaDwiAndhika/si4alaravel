@extends('layout.main')
@section('title', 'Mahasiswa')

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
                    <h3 class="card-title mb-0">Daftar Mahasiswa</h3>
                    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">Tambah Mahasiswa</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NPM</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Asal SMA</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswa as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->npm }}</td>
                                        <td>{{ $item->jk }}</td>
                                        <td>{{ $item->tempat_lahir }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <td>{{ $item->asal_sma }}</td>
                                        <td>
                                            @if ($item->foto)
                                                <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" width="80" class="img-thumbnail">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data mahasiswa belum tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <small>Data Mahasiswa &copy; {{ date('Y') }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
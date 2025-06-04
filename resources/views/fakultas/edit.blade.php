@extends('layout.main')
@section('title', 'Edit Fakultas')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Fakultas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Fakultas</label>
                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $fakultas->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="singkatan" class="form-label">Singkatan</label>
                            <input type="text" name="singkatan" id="singkatan" class="form-control @error('singkatan') is-invalid @enderror" value="{{ old('singkatan', $fakultas->singkatan) }}" maxlength="5" required>
                            @error('singkatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dekan" class="form-label">Dekan</label>
                            <input type="text" name="dekan" id="dekan" class="form-control @error('dekan') is-invalid @enderror" value="{{ old('dekan', $fakultas->dekan) }}" required>
                            @error('dekan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="wakil_dekan" class="form-label">Wakil Dekan</label>
                            <input type="text" name="wakil_dekan" id="wakil_dekan" class="form-control @error('wakil_dekan') is-invalid @enderror" value="{{ old('wakil_dekan', $fakultas->wakil_dekan) }}" required>
                            @error('wakil_dekan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
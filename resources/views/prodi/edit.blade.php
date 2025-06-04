@extends('layout.main')
@section('title', 'Edit Program Studi')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Program Studi</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Prodi</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama', $prodi->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="singkatan" class="form-label">Singkatan</label>
                            <input type="text" name="singkatan" id="singkatan" class="form-control" value="{{ old('singkatan', $prodi->singkatan) }}" maxlength="10" required>
                            @error('singkatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kaprodi" class="form-label">Kaprodi</label>
                            <input type="text" name="kaprodi" id="kaprodi" class="form-control" value="{{ old('kaprodi', $prodi->kaprodi) }}" required>
                            @error('kaprodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sekretaris" class="form-label">Sekretaris</label>
                            <input type="text" name="sekprodi" id="sekprodi" class="form-control" value="{{ old('sekprodi', $prodi->sekprodi) }}" required>
                            @error('sekprodi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="fakultas_id" class="form-label">Fakultas</label>
                            <select name="fakultas_id" id="fakultas_id" class="form-select @error('fakultas_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Fakultas --</option>
                                @foreach($fakultas as $item)
                                    <option value="{{ $item->id }}" {{ old('fakultas_id', $prodi->fakultas_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('fakultas_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
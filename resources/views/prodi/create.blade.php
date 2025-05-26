@extends('layout.main')
@section('title', 'Prodi')

@section('content')
<div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Tambah Fakultas</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('prodi.store') }}" method="POST">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="singkatan" class="form-label">Singkatan</label>
                        <input type="text" class="form-control" name="singkatan">
                        @error('singkatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="kaprodi" class="form-label">Kaprodi</label>
                        <input type="text" class="form-control" name="kaprodi">
                        @error('kaprodi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="sekprodi" class="form-label">Sekprodi</label>
                        <input type="text" class="form-control" name="sekprodi">
                        @error('sekprodi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <select class="form-select" name="fakultas_id">
                          @foreach ($fakultas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                          @endforeach
                        </select>
                      </div>  
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
@endsection
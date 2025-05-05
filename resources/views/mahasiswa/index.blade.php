extends('layout.main')

@section('content')
    <h1>Mahasiswa</h1>
    
    @foreach ($mahasiswa as $item)
        {{ $item->nama }} <br>
        {{ $item->nim }} <br>
        {{ $item->fakultas->nama }} <br>
        {{ $item->fakultas->singkatan }} <br>
        {{ $item->fakultas->dekan }} <br>
        {{ $item->fakultas->wakil_dekan }} <br>
    @endforeach
@endsection 
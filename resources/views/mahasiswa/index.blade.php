@extends('layout.main')

@section('content')
<h1>Mahasiswa</h1>
    @foreach ($mahasiswa as $item)
     
        {{ $item->npm }} | {{ $item ->nama }} | {{ $item->jk }} | {{ $item->tanggal_lahir }} | {{ $item->tempat_lahir }} | {{ $item->asal_sma }} | {{ $item->prodi->nama}} | {{ $item->foto }}

    @endforeach
@endsection
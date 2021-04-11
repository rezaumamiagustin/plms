@extends('layout.app')
@section('title', 'CRUD Siswa')

@section('content')
<div class="card mt-5">
    <div class="card-header text-center">
        <strong>EDIT DATA SISWA</strong>
    </div>
    <div class="card-body">
        <a href="/Admin/a_siswa" class="btn btn-primary">Kembali</a>
        <br>

        <form method="post" action="/Admin/a_siswa/{{ $siswa->id }}">

            @csrf
            @method('patch')

            <div class="form-group">
                <label>Nama</label>
                <input id="nama_siswa" name="nama_siswa" class="form-control @error('nama_siswa') is-invalid @enderror "
                    value="{{ $siswa->nama_siswa }}">

                @if($errors->has('nama_siswa'))
                <div class="text-danger">
                    {{ $errors->first('nama_siswa')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Kelas</label>
                <input id="kelas" name="kelas" class="form-control @error('kelas') is-invalid @enderror "
                    value="{{ $siswa->kelas }}">

                @if($errors->has('kelas'))
                <div class="text-danger">
                    {{ $errors->first('kelas')}}
                </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
@endsection
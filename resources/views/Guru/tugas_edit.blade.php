@extends('layout.app')
@section('title', 'Edit Tugas')

@section('content')
<div class="card mt-5">
    <div class="card-header text-center">
        <strong>EDIT TUGAS</strong>
    </div>
    <div class="card-body">
        <a href="/Guru/tugas" class="btn btn-primary">Kembali</a>
        <br>

        <form method="post" action="/Guru/tugas/{{ $tugas->id }}">

            @csrf
            @method('patch')

            <div class="form-group">
                <label>Nama</label>
                <input id="nama_tugas" name="nama_tugas" class="form-control @error('nama_tugas') is-invalid @enderror "
                    value="{{ $tugas->nama_tugas }}">

                @if($errors->has('nama_tugas'))
                <div class="text-danger">
                    {{ $errors->first('nama_tugas')}}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Tanggal Pengumpulan</label>
                <input id="end_date" name="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror "
                    value="{{ $tugas->end_date }}">

                @if($errors->has('end_date'))
                <div class="text-danger">
                    {{ $errors->first('end_date')}}
                </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
@extends('layout.app')
@section('title', 'Tugas Guru')
    
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            <strong>TAMBAH DATA TUGAS</strong>
        </div>
        <div class="card-body">
            <a href="/Guru/tugas" class="btn btn-primary">Kembali</a>
            <br>

            <form method="post" action="{{ route('storeSiswaTugas') }} ">

                @csrf

                <div class="form-group">
                    <label>Nama</label>
                    <input id="nama_tugas" name="nama_tugas" class="form-control @error('nama_tugas') is-invalid @enderror "
                        value="{{ old('nama_tugas') }}">

                    @if($errors->has('nama_tugas'))
                    <div class="text-danger">
                        {{ $errors->first('nama_tugas')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Pengumpulan</label>
                    <input id="end_date" name="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror "
                        value="{{ old('end_date') }}">

                    @if($errors->has('end_date'))
                    <div class="text-danger">
                        {{ $errors->first('end_date')}}
                    </div>
                    @endif

                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                {{-- <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div> --}}

            </form>

        </div>
    </div>
</div>
@endsection
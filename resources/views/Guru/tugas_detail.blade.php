@extends('layout.app')
@section('title', 'Detail Tugas')

@section('content')
<br>
<div class="row justify-content-center align-items-center">
    <div class="col-sm-4">
	    <div class="card text-center">
            <div class="card-header">
            Detail Tugas
            </div>
            <div class="card-body">
            <h5 class="card-title"><b>Nama : </b>{{$tugas->nama_tugas}}</h5>
            <p class="card-text"><b>Batas Pengumpulan : </b>{{$tugas->end_date}}</p>
          
            </div>
            <div class="card-footer text-muted">
                <a href="/Guru/tugas" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
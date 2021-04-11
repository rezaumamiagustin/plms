@extends('layout.app')
@section('title', 'CRUD Siswa')

@section('content')
<br>
<div class="row justify-content-center align-items-center">
    <div class="col-sm-4">
	    <div class="card text-center">
            <div class="card-header">
            Detail Siswa
            </div>
            <div class="card-body">
            <h5 class="card-title"><b>Nama : </b>{{$siswa->nama_siswa}}</h5>
            <p class="card-text"><b>Kelas : </b>{{$siswa->kelas}}</p>
          
            </div>
            <div class="card-footer text-muted">
                <a href="/Admin/a_siswa" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
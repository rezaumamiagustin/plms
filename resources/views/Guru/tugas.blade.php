@extends('layout.app')
@section('title', 'Tugas Guru')
    
@section('content')
    <br>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
             {{ session('status') }}
         </div>
        @endif
    </div>
    <div class="float-right my-2">
        <a class="btn btn-success" href="/Guru/tugas/create">Tambah Data Tugas</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama Tugas</th>
            <th>Pengumpulan</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($tugas as $tgs)
        <tr>
            <td>{{ $tgs->id }}</td>
            <td>{{ $tgs->nama_tugas }}</td>
            <td>{{ $tgs->end_date }}</td>
            <td>
                {{-- <form action="{{ route('users.destroy',$user->id) }}" method="POST"> --}}
                {{-- <form action="/Admin/a_siswa/{{ $sis->id }}" method="post"
                    class="d-inline">
                        @method('patch')
                        @csrf
                        <a class="btn btn-info" href="/Admin/a_siswa/{{ $sis->id }}">Show</a>
                </form> --}}
                {{-- <a class="btn btn-info" href="/Admin/a_siswa/{{ $sis->id }}">Show</a>
                <a class="btn btn-primary" href="/Admin/a_siswa/edit/{{ $sis->id }}">Edit</a>
                <form action="/Admin/a_siswa/{{ $sis->id }}" method="post"
                    class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form> --}}
            </td>
        </tr>
        @endforeach
    </table>
@endsection
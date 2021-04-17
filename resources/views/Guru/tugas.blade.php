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
        @php $no=1; @endphp
        @foreach ($tugas as $tgs)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $tgs->nama_tugas }}</td>
            <td>{{ $tgs->end_date }}</td>
            <td>
                <a class="btn btn-info" href="/Guru/tugas/{{ $tgs->id }}">Show</a>
                <a class="btn btn-primary" href="/Guru/tugas/edit/{{ $tgs->id }}">Edit</a>
                <form action="/Guru/tugas/{{ $tgs->id }}" method="post"
                    class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
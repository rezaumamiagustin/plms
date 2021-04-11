@extends('layout.app')
@section('title', 'CRUD Siswa')
    
@section('content')

    <h1>ini Tugas SISWA - Siswa</h1>
    <br>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
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
                 <a class="btn btn-info" href="/Siswa/tugas/{{ $tgs->id }}">Show</a>
                {{-- <a class="btn btn-primary" href="/Admin/a_siswa/edit/{{ $sis->id }}">Edit</a>
                <form action="/Admin/a_siswa/{{ $sis->id }}" method="post"
                    class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form>  --}}
            </td>
        </tr>
        @endforeach
    </table>

@endsection
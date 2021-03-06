@extends('layout.app')
@section('title', 'CRUD Siswa')
    
@section('content')

    <h1>ini CRUD SISWA - ADMIN</h1>
    <br>
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="float-right my-2">
        <a class="btn btn-success" href="/Admin/a_siswa/create">Tambah Data Siswa</a>
    </div>

    
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th width="280px">Aksi</th>
        </tr>
        @php $no=1; @endphp
        @foreach ($siswa as $sis)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $sis->nama_siswa }}</td>
            <td>{{ $sis->kelas }}</td>
            <td>
                {{-- <form action="{{ route('users.destroy',$user->id) }}" method="POST"> --}}
                {{-- <form action="/Admin/a_siswa/{{ $sis->id }}" method="post"
                    class="d-inline">
                        @method('patch')
                        @csrf
                        <a class="btn btn-info" href="/Admin/a_siswa/{{ $sis->id }}">Show</a>
                </form> --}}
                <a class="btn btn-info" href="/Admin/a_siswa/{{ $sis->id }}">Show</a>
                <a class="btn btn-primary" href="/Admin/a_siswa/edit/{{ $sis->id }}">Edit</a>
                <form action="/Admin/a_siswa/{{ $sis->id }}" method="post"
                    class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{-- {!! $users->links() !!} --}}
    </div>

@endsection
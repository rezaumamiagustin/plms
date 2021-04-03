@extends('layout.app')
@section('title', 'CRUD Kelas')
    
@section('content')

    <h1>ini CRUD Kelas - ADMIN</h1>
    <br>
    <div class="float-right my-2">
        <a class="btn btn-success" href="#">Tambah Data Kelas</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Kelas</th>
            <th>PA</th>
            <th width="280px">Aksi</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Kelas</td>
            <td>PA</td>
            <td>
                {{-- <form action="{{ route('users.destroy',$user->id) }}" method="POST"> --}}
   
                    <a class="btn btn-info" href="#">Show</a>
    
                    <a class="btn btn-primary" href="#">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </table>
    <div class="text-center">
        {{-- {!! $users->links() !!} --}}
    </div>


@endsection
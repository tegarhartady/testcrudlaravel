@extends('layouts.sidebar')
@extends('layouts.css')

@section('content')
<div class="card">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User</h3>
            <a href="/users/create" class="btn btn-primary float-right">Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Updated</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                <tr>
                    <td>{{ $no++}} </td>
                    <td>{{ $u->name}} </td>
                    <td>{{ $u->email}} </td>
                    <td>{{ $u->created_at}} </td>
                    <td>{{ $u->updated_at}} </td>
                    <td>
                        <a href="{{ route('users.edit', $u->id) }}" class="btn btn-warning">Edit</a> |
                            <form action="{{route('users.destroy', $u->id)}}" method="POST"> 
                            @csrf
                            @method('DELETE')
                            {{-- <a href="/user/hapus/{{ $u->id}}" class="btn btn-danger">Hapus</a> --}}
                                <button class="btn btn-danger" type="submit"> Hapus </button>
                            </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
</div>
@endsection
@extends('layouts.script')

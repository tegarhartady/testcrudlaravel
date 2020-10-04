@extends('layouts.sidebar')
@extends('layouts.css')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
            <a href="/user/create " class="btn btn-primary align-left">Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Updated</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($user as $u)
                    <td>{{ $u->name}} </td>
                    <td>{{ $u->email}} </td>
                    <td>{{ $u->created_at}} </td>
                    <td>{{ $u->updated_at}} </td>
                    <td>
                        <a href="/user/edit/{{ $u->id}}" class="btn btn-warning">Edit</a> | 
                        <a href="/user/hapus/{{ $u->id}}" class="btn btn-danger">Hapus</a>
                    </td>
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

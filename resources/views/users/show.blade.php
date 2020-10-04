@extends('layouts.sidebar')
@extends('layouts.css')

@section('content')
<div class="card">
    <div class="card">
        {{-- <div class="card-header">
            <h3 class="card-title">User</h3>
            <a href="/users/create" class="btn btn-primary float-right">Tambah</a>
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Updated</th>
                {{-- <th>action</th> --}}
            </tr>
            </thead>
            <tbody>
                    @foreach ($users as $p)
                <tr>
                    {{-- <td>{{ $no++}} </td> --}}
                        
                    <td>{{ $p->name}} </td>
                    <td>{{ $p->email}} </td>
                    <td>{{ $p->created_at}} </td>
                    <td>{{ $p->updated_at}} </td>
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

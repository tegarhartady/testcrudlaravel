@extends('layouts.sidebar')
@extends('layouts.css')

@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" action="{{route('users.store')}} " method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="Nama">Nama Lengkap</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Full Name">
              @if($errors->has('name'))
                  <div class="text-danger">
                    {{ $errors->first('name')}}
                  </div>
              @endif
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
              @if($errors->has('email'))
                  <div class="text-danger">
                      {{ $errors->first('email')}}
                  </div>
              @endif
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              @if($errors->has('password'))
                <div class="text-danger">
                    {{ $errors->first('password')}}
                </div>
              @endif
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
            Tambah
          </button>
        </div>
      </form>
    </div>
    <!-- /.card -->

  </div>
@endsection
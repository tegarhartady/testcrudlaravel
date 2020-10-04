@extends('layouts.sidebar')
@extends('layouts.css')

@section('content')
<div class="card">
        <!-- /.card-body -->
    <h1 style="text-align:center;">Selamat Datang {{ Auth::user()->name }}</h1>
        
</div>
@endsection
@extends('layouts.script')

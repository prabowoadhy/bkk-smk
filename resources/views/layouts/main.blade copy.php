@extends('layouts.main')
@section('content')
<section class="page-section mt-4">
    <div class="container-fluid">
        <div class="row">
        
            @include('layouts.sidebars')
        <div class="col-md-9">
            @yield('siswa-content')
        </div>
    </div>
</section>
@endsection

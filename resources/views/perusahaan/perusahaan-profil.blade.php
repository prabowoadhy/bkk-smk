@extends('layouts.main')
@section('styles')
<link href="{{ asset('') }}css/sidebars.css" rel="stylesheet">
@endsection
@section('content')
<section class="page-section mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.sidebars-perusahaan')
            </div>
            <div class="col-md-9">
                <div class="alert alert-secondary" role="alert">Profil Siswa</div>
                
                                    
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
{{-- <script src="{{ asset('') }}js/sidebars.js"></script> --}}
@endsection
@extends('layout.master')
@section('title', 'Dashboard')
@push('custom-css')
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

@endpush

@section('content')
<section class="content">
<div class="jumbotron">
    <div class="container">
      <center>
    <h2>HALAMAN DASHBOARD
    <br>
    SISTEM INFORMASI PERJALANAN DINAS PEGAWAI
    <br>
    SEKOLAH VOKASI
    <br>
    UNIVERSITAS SEBELAS MARET(UNS)
    </br>
    </h2>
    <div class="image">
          <img src="{{ asset('') }}assets/dist/img/uns2.png" width="110" class="img-circle" alt="UNS Logo">
          <img src="{{ asset('') }}assets/dist/img/logosv.png" width="120" class="img-circle" alt="SV Logo">
        </div>
  </center>
    </div>
</div>

    </section>
@endsection
@include('sweetalert::alert')
@push('custom.script')
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
@endpush


@extends('layout.master')
@section('title', 'Dashboard')
@push('custom-css')

@endpush


@section('content')
<section class="content">
<div class="jumbotron">
    <div class="container">
      <center>
    <h2>INI HALAMAN STAFF
    <br>
    SEKOLAH VOKASI
    <br>
    UNIVERSITAS SEBELAS MARET(UNS)
</br></h2>
<div class="image">
          <img src="{{ asset('') }}assets/dist/img/uns2.png" width="110" class="img-circle" alt="UNS Logo">
          <img src="{{ asset('') }}assets/dist/img/logosv.png" width="120" class="img-circle" alt="SV Logo">
        </div>
  </center>
    </div>
  </div>

    </section>
@endsection

@push('custom.js')

@endpush


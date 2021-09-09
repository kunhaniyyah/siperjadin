<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    table.static{
        position: relative;
        border: 1px solid #543535;
    }

</style>
<title>CETAK DATA SURAT TUGAS</title>
</head>
<body>
<div class="form-group">
    <p align="center"><b>Rekap Data Surat Tugas</b></p>
    <table class="static" align="center" rules="all" style="width: 95%;">
        <tr>
            <th>No. Surat Tugas</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Keperluan</th>
        </tr>
        @foreach ($datast as $item)
        <tr>
            <th>{{$item->no_st}}</th>
            <th>{{$item->nip}}</th>
            <th>{{$item->nama}}</th>
            <th>{{date('d-m-Y', strtotime($item->tanggal))}}</th>
            <th>{{$item->keperluan}}</th>
        </tr>
        @endforeach
</table>
</div>
        <script type="text/javascript">
            window.print();
            
        </script>
</body>
</html>

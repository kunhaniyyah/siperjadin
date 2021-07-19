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
<title>CETAK DATA SPPD</title>
</head>
<body>
<div class="form-group">
    <p align="center"><b>Rekap Data SPPD</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr>
            <th>No.SPPD</th>
            <th>No. Surat Tugas</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tingkat</th>
            <th>Tanggal Berangkat</th>
            <th>Tanggal Pulang</th>
            <th>Kegiatan</th>
        </tr>
        @foreach ($sppd as $item)
        <tr>
            <th>{{$item->no_sppd}}</th>
            <th>{{$item->no_st}}</th>
            <th>{{$item->nip}}</th>
            <th>{{$item->nama}}</th>
            <th>{{$item->tingkat}}</th>
            <th>{{date('d-m-Y', strtotime($item->tgl_berangkat))}}</th>
            <th>{{date('d-m-Y', strtotime($item->tgl_pulang))}}</th>
            <th>{{$item->kegiatan}}</th>
        </tr>
        @endforeach
</table>
</div>
        <script type="text/javascript">
            window.print();
            
        </script>
</body>
</html>

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
<title>CETAK DATA PEGAWAI</title>
</head>
<body>
<div class="form-group">
    <p align="center"><b>Rekap Data Pegawai</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tingkat</th>
            <th>Pangkat</th>
            <th>Jabatan Fungsional</th>
            <th>Fakultas</th>
        </tr>
        @foreach ($datapegawai as $item)
        <tr>
            <th>{{$item->nip}}</th>
            <th>{{$item->nama}}</th>
            <th>{{$item->tingkat}}</th>
            <th>{{$item->pangkat}}</th>
            <th>{{$item->jabfung->jabfung}}</th>
            <th>{{$item->fakultas}}</th>
        </tr>
        @endforeach
</table>
</div>
        <script type="text/javascript">
            window.print();
            
        </script>
</body>
</html>

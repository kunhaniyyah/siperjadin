<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>CETAK DATA SURAT TUGAS</title>
<style>
    table.tr.td{
        position: relative;
        border: solid #543535;
        font-size:13;
    }
    .bold_text {
    font-weight: bold;
}
</style>
</head>
<body>
    <center>
    <table style="width: 85%;">
        <tr>
            <!-- <td><img src="{{ asset('assets/dist/img/uns2.png') }}" float="right" margin="15px" width="95" height="95"></td> -->
            <td>
                <center> 
                    <font size="4px" font-family="Times New Roman">KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</font><br>
                    <font size="4px" font-family="Times New Roman">UNIVERSITAS SEBELAS MARET</font><br>
                    <font size="4,5px" font-family="Times New Roman" font-weight="bold">SEKOLAH VOKASI</font><br>
                    <font size="3" font-family="Times New Roman">Jalan Kolonel Sutarto No.150K,Jebres, Surakarta 57126</font><br>
                    <font size="3" font-family="Times New Roman">Telp/fax. (0271)664126/2933250/2933539</font><br>
                    <font size="3" font-family="Times New Roman">Web:http//vokasi.uns.ac.id, e-mail: vokasi@unit.uns.ac.id</font><br>
                    <hr color="black" size="3px" width="100%"></hr>
                    <font class="bold-text" size="3" font-family="Times New Roman">SURAT TUGAS</font><br>
                    <hr color="black" width="20%">
                    @foreach ($datast as $item)
                    <font size="3" font-family="Times New Roman">Nomor : {{$item->no_st}}</font><br>
                    @endforeach
                </center>    
            </td>
        </tr>
        </table>
        <br>
        <br>
        <table style="width: 65%">
                <tr>
                    <td width="900" padding= "200px;">Direktur Sekolah Vokasi Universitas Sebelas Maret Surakarta dengan ini menugaskan kepada :</td>
                </tr>
        </table>
        <br>
        <table color="black" class="static" rules="all" border="1px" style="width: 65%;">
        <tr>
            <th align="center">No</th>
            <th>Nama</th>
            <th>NIP</th>
            <th>Jabatan</th>
        </tr>
        @foreach ($datast as $item)
        <tr>
            <th>{{ $loop->iteration}}</th>
            <th>{{$item->nama}}</th>
            <th>{{$item->nip}}</th>
            <th>{{$item->jabatan}}</th>
        </tr>
        @endforeach
        </table>
        <br>
        <table style="width: 65%">
            <tr>
                <td>Keperluan </td>
                @foreach ($datast as $item)
                <td>: {{$item->keperluan}}</td>
                @endforeach
            </tr>
            <tr>
                <td>Tanggal </td>
                @foreach ($datast as $item)
                <td>: {{date('d-m-Y', strtotime($item->tanggal))}}</td>
                @endforeach
            </tr>
            <tr>
                <td>Tempat </td>
                @foreach ($datast as $item)
                <td>: {{$item->tempat}}</td>
                @endforeach
            </tr>
        </table>
        <br>
        <table style="width: 65%">
                <tr>
                    <td style="width: 35%" padding= "200px;">
                        Demikian surat tugas ini dibuat untuk dapat dilaksanakan sebaik-baiknya dan memberikan laporan 
                        setelah pelaksanaan tugas selesai. 
                    </td>
                </tr>
        </table>
        <br>
        <br>
        <br>
        <table style="width: 50%" align="right">
                <tr>
                    @foreach ($datast as $item)
                    <td width="100">
                        Surakarta, {{date('d-m-Y', strtotime($item->tanggal))}}
                    </td>
                    @endforeach
                  <tr>
                      <td>Direktur</td>
                  </tr>
                </tr>
        </table>
        <br>
        <br>
        <table style="width: 50%" align="right">
        <br>
        <br>
        <br>
        <br>
            <tr>
                <td>Drs. Santoso Tri Hananto, M.Acc.,Ak</td>
            </tr>
            <tr>
                <td>NIP. 196909241994021001</td>
            </tr>
        </table>
    </center>
        <script type="text/javascript">
            window.print();
            
        </script>
</body>
</html>

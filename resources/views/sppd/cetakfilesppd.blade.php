<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>CETAK SPPD</title>
<style>
    table.tr.td{
        position: relative;
        border: 1px solid #543535;
        font-size:13;
    }
    .bold_text {
    font-weight: bold;
}
table {
    border-spacing: 0px;
}
</style>
</head>
<body>
    <center>
    <table style="width: 65%;" border="1">
        <tr>
            <!-- <td><img src="{{ asset('assets/dist/img/uns2.png') }}" float="right" margin="15px" width="95" height="95"></td> -->
            <td>
                <center> 
                    <font size="4px" font-family="Times New Roman">KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</font><br>
                    <font size="4px" font-family="Times New Roman">UNIVERSITAS SEBELAS MARET</font><br>

                </center>    
            </td>
        </tr>
        </table>
        <br>
        <br>
        <table style="width: 65%" border="1">
                <tr>
                    <td width="200" padding= "900px;">KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</td>
                </tr>
        </table>
</center>
        <!-- <script type="text/javascript">
            window.print();
            
        </script>
      -->
</body>
</html>

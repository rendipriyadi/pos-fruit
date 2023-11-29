<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Inovice</title>
</head>

<body onload="window.print();">
    <table border="0" style="text-align: center; width: 100%;">
        <tr>
            <td colspan="2">
                <h3 style="height: 2px;">Toko Rendi Priyadi</h3>
                <h5>Jl. Wibawa Mukti IV Rt 01/ Rw 17 Jatimekar,Jatiasih, Kota Bekasi, Telp : 08978305336</h5>
                <hr style="border: none; border-top: 1px solid #000;">
            </td>
        </tr>
        <tr style="text-align: left;">
            <td>Invoice :</td>
            <td>{{ $invoice }}</td>
        </tr>
    </table>
</body>

</html>

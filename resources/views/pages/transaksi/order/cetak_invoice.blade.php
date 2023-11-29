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
            <td>{{ $no_invoice }}</td>
        </tr>
        <tr style="text-align: left;">
            <td>Tanggal :</td>
            <td>{{ date('d-m-Y', strtotime($tanggal)) }}</td>
        </tr>
        <tr style="text-align: left;">
            <td>Customer :</td>
            <td>{{ $customer }}</td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="border: none; border-top: 1px dashed #000;">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="width: 100%; text-align:left; font-size:10pt;">
                    @foreach ($detail_order as $order)
                        <tr>
                            <td colspan="3">{{ $order->item_buah->nama }}</td>
                        </tr>
                        <tr>
                            <td>{{ number_format($order->qty, 0, ',', '.') . '' . $order->item_buah->unit }}</td>
                            <td style="text-align: right;">{{ number_format($order->item_buah->harga, 0, ',', '.') }}
                            </td>
                            <td style="text-align: right;">{{ number_format($order->total, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">
                            <hr style="border: none; border-top: 1px dashed #000;">
                        </td>
                    </tr>
                    <tr style="text-align: right;">
                        <td></td>
                        <td>Total Harga :</td>
                        <td>{{ number_format($total_harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr style="text-align: right;">
                        <td></td>
                        <td>Jumlah Uang :</td>
                        <td>{{ number_format($jumlah_uang, 0, ',', '.') }}</td>
                    </tr>
                    <tr style="text-align: right;">
                        <td></td>
                        <td>Sisa Uang :</td>
                        <td>{{ number_format($sisa_uang, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <hr style="border: none; border-top: 1px dashed #000;">
                        </td>
                    </tr>
                    <tr style="text-align: center;">
                        <td colspan="3">
                            Terimakasih Atas Kunjungan Anda
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>

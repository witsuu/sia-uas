<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        .table {
            width: 100%;
            color: #000;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        /* .table-bordered {
            border: 1px solid #7c7c7c;
        } */

        th,
        tr,
        td {
            /* border: 1px solid black; */
            /* border-collapse: collapse; */
            border-spacing: 0;
        }

        th,
        td {
            padding: 18px;
        }

        thead {
            background-color: #4947c2;
            color: #fff;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: bold;
        }

        .container {
            margin-right: 15px;
            margin-left: 15px;
        }

        .border-none {
            border: none !important;
        }

        .border {
            border-top: 1px solid #3a3a3a;
            border-bottom: 1px solid #3a3a3a;
        }

        .text-left {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="text-center" style="margin:20px">
        <h4>Itech Prima</h4>
        <h1>Laporan Laba Rugi</h1>
        <span>{!!Carbon\Carbon::parse($fullDate)->isoFormat("MMMM").' '.$tahun!!} </span>
    </div>
    <hr>
    <div class="container" style="margin-top: 15px">
        <table class="table">
            <thead class="text-left">
                <tr>
                    <th>Kode Akun</th>
                    <th>Nama Akun</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" class="font-bold">PENDAPATAN</td>
                </tr>
                @php
                $jumlahPendapatan=0;
                @endphp
                @foreach ($akunPendapatan as $akun)
                <tr>
                    <td>{{__($akun->kode_akun)}}</td>
                    <td>{{__($akun->nama_akun)}}</td>
                    @php
                    $saldo=0;
                    @endphp
                    @foreach ($transaksis as $transaksi)
                    @if ($transaksi->kode_akun == $akun->kode_akun)
                    @php
                    $saldo+=$transaksi->saldo;
                    @endphp
                    @endif
                    @endforeach
                    <td>{{__('Rp. '.number_format($saldo,0,',',','))}}</td>
                    @php
                    $jumlahPendapatan+=$saldo;
                    @endphp
                </tr>
                @endforeach
                <tr style="background-color: rgb(34, 151, 53);color:#fff">
                    <td class="font-bold" colspan="2">JUMLAH PENDAPATAN</td>
                    <td class="font-bold "> {{__('Rp. '.number_format($jumlahPendapatan,0,',',','))}} </td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3" class="font-bold">BIAYA</td>
                </tr>
                @php
                $jumlahBiaya=0;
                @endphp
                @foreach ($akunBiaya as $akun)
                <tr>
                    <td>{{__($akun->kode_akun)}}</td>
                    <td>{{__($akun->nama_akun)}}</td>
                    @php
                    $saldoBiaya=0;
                    @endphp
                    @foreach ($transaksis as $transaksi)
                    @if ($transaksi->kode_akun == $akun->kode_akun)
                    @php
                    $saldoBiaya+=$transaksi->saldo;
                    @endphp
                    @endif
                    @endforeach
                    <td>{{__('Rp. '.number_format($saldoBiaya,0,',',','))}}</td>
                    @php
                    $jumlahBiaya+=$saldoBiaya;
                    @endphp
                </tr>
                @endforeach
                <tr style="background-color: rgb(34, 151, 53);color:#fff">
                    <td class="font-bold" colspan="2">JUMLAH BIAYA</td>
                    <td class="font-bold "> {{__('Rp. '.number_format($jumlahBiaya,0,',',','))}} </td>
                </tr>
                <tr>
                    <td class="border-none" colspan="3"></td>
                </tr>
                @php
                $labaKotor = $jumlahPendapatan-$jumlahBiaya;
                @endphp
                @if ($labaKotor >= 0)
                <tr style="background-color: rgb(34, 151, 53);color:#fff">
                    <td colspan="2" class="font-bold">LABA</td>
                    <td class="font-bold"> {{__('Rp. '.number_format($labaKotor,0,',',','))}} </td>
                </tr>
                <tr style="background-color: #be3636;color:#fff">
                    <td colspan="2" class="font-bold">RUGI</td>
                    <td class="font-bold"> {{__('Rp. '.number_format(0,0,',',','))}} </td>
                </tr>
                @else
                <tr style="background-color: rgb(34, 151, 53);color:#fff">
                    <td colspan="2" class="font-bold">LABA</td>
                    <td class="font-bold"> {{__('Rp. '.number_format(0,0,',',','))}} </td>
                </tr>
                <tr style="background-color: #be3636;color:#fff">
                    <td colspan="2" class="font-bold">RUGI</td>
                    <td class="font-bold"> {{__('Rp. '.number_format(abs($labaKotor),0,',',','))}} </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>

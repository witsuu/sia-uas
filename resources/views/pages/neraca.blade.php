@extends('layouts.master')

@section('title','Neraca')
@section('nama_menu','Neraca')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Neraca</h4>
    </div>
    <div class="card-body">
        <table id="dataTableDetail" class="table align-items-center table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Akun</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalDebit=0;
                $totalKredit=0;
                @endphp
                @foreach ($akuns as $akun)
                @php
                $debit=0;
                $kredit=0;
                @endphp
                <tr>
                    <td>{{__($akun->kode_akun)}}</td>
                    <td>{{__($akun->nama_akun)}}</td>
                    @foreach ($details as $transaksi)
                    @if ($transaksi->nama_akun == $akun->nama_akun)
                    @php
                    if($transaksi->jenis_saldo=='debit'){
                    $debit = $debit + $transaksi->saldo;
                    }else{
                    $kredit = $kredit + $transaksi->saldo;
                    }
                    $hasil = $debit-$kredit;
                    @endphp
                    @endif
                    @endforeach
                    @if ($hasil>=0)
                    <td>{{__('Rp. '.number_format($hasil,0,',',','))}}</td>
                    <td>-</td>
                    @php
                    $totalDebit+=$hasil;
                    @endphp
                    @else
                    <td>-</td>
                    <td>{{__('Rp. '.number_format(abs($hasil),0,',',','))}}</td>
                    @php
                    $totalKredit+=$hasil;
                    @endphp
                    @endif
                </tr>
                @endforeach
                @if ($totalDebit != abs($totalKredit))
                <tr>
                    <td class="text-center" colspan="2"><b>Total</b></td>
                    <td class="text-danger"><?= 'Rp. '.number_format($totalDebit,0,',','.') ?></td>
                    <td class="text-danger"><?= 'Rp. '.number_format(abs($totalKredit),0,',','.') ?></td>
                </tr>
                <tr class="bg-danger text-center">
                    <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">TIDAK SEIMBANG</td>
                </tr>
                @else
                <tr>
                    <td class="text-center" colspan="2"><b>Total</b></td>
                    <td class="text-success"><?= 'Rp. '.number_format($totalDebit,0,',','.') ?></td>
                    <td class="text-success"><?= 'Rp. '.number_format(abs($totalKredit),0,',','.') ?></td>
                </tr>
                <tr class="bg-success text-center">
                    <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">SEIMBANG</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

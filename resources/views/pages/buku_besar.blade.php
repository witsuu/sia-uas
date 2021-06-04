@extends('layouts.master')

@section('title','Buku Besar')
@section('nama_menu','Buku Besar')

@section('content')
<div class="card">
    <div class="card-header">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            @foreach ($akuns as $akun)
            <li class="nav-item">
                <a class="nav-link tab-nav" href="{{__('#'.str_replace(" ","",$akun->nama_akun))}}"
                    data-toggle="tab">{{__($akun->nama_akun)}}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <script>
        $(() => {
            $(".tab-nav").eq(0).addClass('active');
            $('.tab-pane').eq(0).addClass('show active');
        })

    </script>
    <div class="card-body">
        <div class="tab-content">
            @foreach ($akuns as $akun)
            <div class="tab-pane fade" id="{{__(str_replace(" ","",$akun->nama_akun))}}" role="tabpanel">
                <table id="dataTableDetail" class="table align-items-center table-striped table-bordered"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th rowspan="2">Tanggal</th>
                            <th rowspan="2">Nama Akun</th>
                            <th rowspan="2">Kode</th>
                            <th rowspan="2">Debit</th>
                            <th rowspan="2">Kredit</th>
                            <th colspan="2">Saldo</th>
                        </tr>
                        <tr>
                            <th>Debit</th>
                            <th>Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $debit=0;
                        $kredit=0;
                        @endphp
                        @foreach ($details as $transaksi)
                        @if ($transaksi->nama_akun==$akun->nama_akun)
                        <tr>
                            <td>{{__(Carbon\Carbon::parse($transaksi->tanggal_transaksi)->isoFormat('DD MMMM Y'))}}</td>
                            <td>{{__($transaksi->nama_akun)}}</td>
                            <td>{{__($transaksi->kode_akun)}}</td>
                            @if ($transaksi->jenis_saldo=='debit')
                            <td>{{__('Rp. '.number_format($transaksi->saldo,0,',',','))}}</td>
                            <td>Rp. 0</td>
                            @else
                            <td>Rp. 0</td>
                            <td>{{__('Rp. '.number_format($transaksi->saldo,0,',',','))}}</td>
                            @endif
                            @php
                            if($transaksi->jenis_saldo=='debit'){
                            $debit = $debit + $transaksi->saldo;
                            }else{
                            $kredit = $kredit + $transaksi->saldo;
                            }
                            $hasil = $debit-$kredit;
                            @endphp
                            @if ($hasil >= 0)
                            <td>{{__('Rp. '.number_format($hasil,0,',',','))}}</td>
                            <td>-</td>
                            @else
                            <td>-</td>
                            <td>{{__('Rp. '.number_format(abs($hasil),0,',',','))}}</td>
                            @endif
                        </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td class="text-center" colspan="5"><b>Total</b></td>
                            @if ($hasil >= 0)
                            <td class="text-success"><strong>{{__('Rp. '.number_format($hasil,0,',',','))}}</strong>
                            </td>
                            <td>-</td>
                            @else
                            <td>-</td>
                            <td>{{__('Rp. '.number_format(abs($hasil),0,',',','))}}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

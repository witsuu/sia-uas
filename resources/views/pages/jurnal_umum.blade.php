@extends('layouts.master')

@section('title','Jurnal Umum')
@section('nama_menu','Jurnal Umum')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Jurnal Umum</h4>
    </div>
    <div class="card-body">
        <table id="dataTableDetail" class="table align-items-center table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Akun</th>
                    <th>Kode</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    @if ($user->role != "owner")
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php
                $totalDebit = 0;
                $totalKredit=0;
                $debit=0;
                $kredit=0;
                @endphp
                @foreach ($details as $transaksi)
                <tr>
                    <td>{{__(Carbon\Carbon::parse($transaksi->tanggal_transaksi)->isoFormat('DD MMMM Y'))}}</td>
                    <td>{{__($transaksi->nama_akun)}}</td>
                    <td>{{__($transaksi->kode_akun)}}</td>
                    <td>@if ($transaksi->jenis_saldo == "debit")
                        {{__('Rp. '.number_format($transaksi->saldo,0,',',','))}}
                        @php
                        $totalDebit+=$transaksi->saldo;
                        @endphp
                        @endif</td>
                    <td>@if ($transaksi->jenis_saldo=='kredit')
                        {{__('Rp. '.number_format($transaksi->saldo,0,',',','))}}
                        @php
                        $totalKredit+=$transaksi->saldo;
                        @endphp
                        @endif</td>
                    @if ($user->role != "owner")
                    <td class="d-flex">
                        <form action="{{ route('edit_jurnal_umum') }}" method="post" class="mr-2">
                            @csrf
                            <input type="text" name="id" value="{{__($transaksi->id)}}" hidden>
                            <button class="btn btn-secondary" type="submit">Edit</button>
                        </form>
                        <button class="btn btn-danger" data-toggle="modal"
                            data-target="{{__("#delete_".$transaksi->kode_akun)}}">Hapus</button>
                    </td>
                    @endif
                </tr>
                @endforeach
                @if ($totalDebit != abs($totalKredit))
                <tr>
                    <td class="text-center" colspan="3"><b>Total</b></td>
                    <td class="text-danger"><?= 'Rp. '.number_format($totalDebit,0,',','.') ?></td>
                    <td class="text-danger"><?= 'Rp. '.number_format(abs($totalKredit),0,',','.') ?></td>
                    @if ($user->role != "owner")
                    <td></td>
                    @endif
                </tr>
                <tr class="bg-danger text-center">
                    <td colspan="6" class="text-white" style="font-weight:bolder;font-size:19px">TIDAK SEIMBANG</td>
                </tr>
                @else
                <tr>
                    <td class="text-center" colspan="3"><b>Total</b></td>
                    <td class="text-success"><?= 'Rp. '.number_format($totalDebit,0,',','.') ?></td>
                    <td class="text-success"><?= 'Rp. '.number_format(abs($totalKredit),0,',','.') ?></td>
                    @if ($user->role != "owner")
                    <td></td>
                    @endif
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

@section('modal')
@foreach ($details as $transaksi)
<div class="modal fade" id={{__('delete_'.$transaksi->kode_akun)}} tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Postingan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-exclamation-circle text-warning mb-2" style="font-size: 100px"></i>
                <p class="text-uppercase mb-0">Apa Kamu Yakin?</p>
                <p class="mb-0 text-danger">Note: Data yang dihapus akan hilang permanen</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('hapus_jurnal_umum') }}" method="POST" class="w-100">
                    @method('delete')
                    @csrf
                    <input type="text" name="id" hidden value="{{__($transaksi->id)}}">
                    <button type="submit" class="btn btn-danger w-100">HAPUS</button>
                </form>
                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('script')
<script>
    $(() => {
        $("#datepicker").datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true,
        });
    })

</script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
@endsection

@extends('layouts.master')

@section('title','Tambah Jurnal')
@section('nama_menu','Edit jurnal')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Edit Jurnal Umum</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('edit_jurnal_umum') }}" method="post">
            @method('PUT')
            @csrf
            <input type="text" name="id" value="{{__($transaksi->id)}}" hidden>
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <i class="far fa-calendar-alt input-group-text"></i>
                        </div>
                        <input type="text" name="tanggal_transaksi" class="form-control" id="datepicker"
                            autocomplete="false" value="{{__($transaksi->tanggal_transaksi)}}" required>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="KodeAkun">Kode Akun</label>
                    <input type="text" name="kode_akun" readonly class="form-control" id="kode_akun"
                        value="{{__($transaksi->kode_akun)}}" required>
                </div>
                <div class="col-md-4">
                    <label for="jenisSaldo">Jenis Saldo</label>
                    <select name="jenis_saldo" class="form-control" required>
                        <option disabled>- Pilih Jenis Saldo -</option>
                        <option value="debit" @if ($transaksi->jenis_saldo == "debit") selected @endif>Debit</option>
                        <option value="kredit" @if ($transaksi->jenis_saldo == "kredit") selected @endif>Kredit</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="saldo">Saldo</label>
                    <input type="number" class="form-control" min="0" name="saldo" value="{{__($transaksi->saldo)}}"
                        required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">SIMPAN PERUBAHAN</button>
        </form>
    </div>
</div>
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

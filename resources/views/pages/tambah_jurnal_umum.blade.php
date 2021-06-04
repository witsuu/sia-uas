@extends('layouts.master')

@section('title','Tambah Jurnal')
@section('nama_menu','Tambah jurnal')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Tambah Jurnal Umum</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('store_jurnal_umum') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <i class="far fa-calendar-alt input-group-text"></i>
                        </div>
                        <input type="text" name="tanggal" class="form-control" id="datepicker" autocomplete="false"
                            value="{{date('Y-m-d')}}" required>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="NamaAkun">Nama Akun</label>
                    <select name="akun" class="form-control" id="select_akun" required>
                        <option selected disabled>- Pilih Nama Akun -</option>
                        @foreach ($akuns as $akun)
                        <option value="{{$akun->kode_akun}}">{{$akun->nama_akun}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="KodeAkun">Kode Akun</label>
                    <input type="text" name="kode_akun" readonly class="form-control" id="kode_akun" required>
                </div>
                <script>
                    $(() => {
                        $('#select_akun').change(() => {
                            const kodeAkun = $("#select_akun").val();
                            $("#kode_akun").val(kodeAkun);
                        })
                    })

                </script>
                <div class="col-md-3">
                    <label for="jenisSaldo">Jenis Saldo</label>
                    <select name="jenis_saldo" class="form-control" required>
                        <option disabled selected>- Pilih Jenis Saldo -</option>
                        <option value="debit">Debit</option>
                        <option value="kredit">Kredit</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="saldo">Saldo</label>
                    <input type="number" class="form-control" min="0" name="saldo" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
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

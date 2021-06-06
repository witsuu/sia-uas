@extends('layouts.master')

@section('title','Jurnal Umum')
@section('nama_menu','Jurnal Umum')

@section('content')
@if (session()->has('success') OR session()->has('updated') OR session()->has('deleted'))
<div class="position-absolute" id="layer-toast" aria-live="polite" aria-atomic="true"
    style="z-index:1000; min-height: 200px;width: 300px;right:0">
    <div class="toast" id="toast-success" data-delay="5000">
        <div class="toast-header bg-success text-white">
            <strong class="mr-auto">Success</strong>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
        <div class="toast-body bg-light">
            {{__(session()->get('success'))}}
            {{__(session()->get('updated'))}}
            {{__(session()->get('deleted'))}}
        </div>
    </div>
</div>
@endif
<script>
    $(function () {
        $("#toast-success").toast('show');

        $("#toast-success").on('hidden.bs.toast', function () {
            $('#layer-toast').hide();
        })
    })

</script>
<div class="card">
    @if ($user->role!="owner")
    <div class="card-header text-right">
        <a href="{{ route('tambah_jurnal_umum') }}">
            <button class="btn btn-primary">Tambah Jurnal</button>
        </a>
    </div>
    @endif
    <div class="card-body">
        <table id="dataTable" class="table align-items-center table-striped table-bordered " style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan dan Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1
                @endphp
                @foreach ($jurnals as $jurnal)
                <tr>
                    <td>{!!$no!!}</td>
                    <td>{!!Carbon\Carbon::parse($jurnal->tanggal_transaksi)->isoFormat('MMMM Y')!!}</td>
                    <td>
                        <form action="{{ route('jurnal_umum') }}" method="post">
                            @csrf
                            <input type="text" hidden name="bulan"
                                value="{{__(Carbon\Carbon::parse($jurnal->tanggal_transaksi)->isoFormat('MM'))}}">
                            <input type="text" hidden name="tahun"
                                value="{{__(Carbon\Carbon::parse($jurnal->tanggal_transaksi)->isoFormat('Y'))}}">
                            <button type="submit" class="btn btn-success">Lihat Jurnal</button>
                        </form>
                    </td>
                </tr>
                @php
                $no+=1
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

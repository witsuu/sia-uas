@extends('layouts.master')

@section('title','Laporan Laba Rugi')
@section('nama_menu','Laporan Laba Rugi')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="mb-0">Laporan</h4>
    </div>
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
                @foreach ($transaksiByMonthAndYear as $transaksi)
                <tr>
                    <td>{!!$no!!}</td>
                    <td>{{__(Carbon\Carbon::parse($transaksi->tanggal_transaksi)->isoFormat('MMMM Y'))}}</td>
                    <td>
                        <form action="{{ route('buku_besar') }}" method="post">
                            @csrf
                            <input type="text" hidden name="bulan" value="bulan">
                            <input type="text" hidden name="tahun" value="tahun">
                            <button type="submit" class="btn btn-success">Cetak Laporan</button>
                        </form>
                    </td>
                    @php
                    $no+=1
                    @endphp
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

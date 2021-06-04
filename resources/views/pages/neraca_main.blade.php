@extends('layouts.master')

@section('title','Neraca')
@section('nama_menu','Neraca')

@section('content')
<div class="card">
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
                        <form action="{{ route('neraca') }}" method="post">
                            @csrf
                            <input type="text" hidden name="bulan"
                                value="{{__(Carbon\Carbon::parse($transaksi->tanggal_transaksi)->isoFormat('MM'))}}">
                            <input type="text" hidden name="tahun"
                                value="{{__(Carbon\Carbon::parse($transaksi->tanggal_transaksi)->isoFormat('Y'))}}">
                            <button type="submit" class="btn btn-success">Lihat Neraca</button>
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

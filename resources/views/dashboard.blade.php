@extends('layouts.master')

@section('title','Dashboard')
@section('nama_menu','Dashboard')


@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-0">Selamat Datang</h4>
    </div>
</div>
{{-- <div class="card mb-4">
    <div class="card-header">
        <h4 class="mb-0">Data Akun</h4>
    </div>
    <div class="card-body">
        <table id="dataTableDashboard" class="table align-items-center table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Akun</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Contoh</td>
                    <th>Contoh</th>
                    <th>Contoh</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        <h4 class="mb-0">Jurnal Umum</h4>
    </div>
    <div class="card-body">
        <table id="dataTableDashboard" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Akun</th>
                    <th>Kode</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{now()}}</td>
<td>Contoh</td>
<td>Contoh</td>
<td>12.000</td>
<td>12.000</td>
</tr>
</tbody>
</table>
</div>
</div> --}}
@endsection

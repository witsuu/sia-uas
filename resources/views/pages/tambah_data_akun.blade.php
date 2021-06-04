@extends('layouts.master')

@section('title','Tambah Data Akun')
@section('nama_menu','Tambah Data Akun')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('store_data_akun') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode">Kode Akun</label>
                <input type="text" class="form-control" name="kode_akun" placeholder="masukkan kode akun" required>
            </div>
            <div class="form-group">
                <label for="nama-akun">Nama Akun</label>
                <input type="text" class="form-control" name="nama_akun" placeholder="masukkan nama akun" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
@endsection

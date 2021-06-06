@extends('layouts.master')

@section('title','Tambah Karyawan')
@section('nama_menu','Tambah Karyawan')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('store_karyawan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="no_karyawan">No. Karyawan</label>
                <input type="text" class="form-control" name="no_karyawan" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" name="foto" required>
            </div>
            <div class="form-group">
                <label for="passwd">Password</label>
                <input type="password" class="form-control" name="password" required>
                @error('password')
                <strong class="text-danger">{{$message}}</strong>
                @enderror
            </div>
            <input type="submit" class="btn btn-success" value="TAMBAH">
        </form>
    </div>
</div>
@endsection

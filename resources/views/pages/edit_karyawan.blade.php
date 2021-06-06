@extends('layouts.master')

@section('title','Edit Karyawan')
@section('nama_menu','Edit Karyawan')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('store_edit_karyawan') }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="text" name="id" value="{{__($karyawan->id)}}" hidden>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" required value="{{__($karyawan->name)}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required value="{{__($karyawan->email)}}">
            </div>
            <div class="form-group">
                <label for="no_karyawan">No. Karyawan</label>
                <input type="text" class="form-control" name="no_karyawan" required
                    value="{{__($karyawan->no_karyawan)}}">
            </div>
            <input type="submit" class="btn btn-success" value="SIMPAN">
        </form>
    </div>
</div>
@endsection

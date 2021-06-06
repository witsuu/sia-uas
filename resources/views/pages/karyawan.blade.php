@extends('layouts.master')

@section('title','Karyawan')
@section('nama_menu','Semua Karyawan')

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
        <div class="toast-body bg-white">
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
    <div class="card-header justify-content-center d-flex">
        <div class="w-100"></div>
        <div>
            <a href="{{ route('tambah_karyawan') }}">
                <button class="btn btn-primary">Tambah Baru</button>
            </a>
        </div>
    </div>
    <div class="card-body">
        @foreach ($karyawans as $karyawan)
        <div class="card shadow mb-2" style="max-height: 200px">
            <div class="card-body p-2 d-flex">
                <img width="70" class="rounded-circle" src="{{ asset($karyawan->foto) }}" alt="user_profile">
                <div class="ml-3 d-flex flex-column justify-content-center">
                    <h4 class="mb-0">{{__($karyawan->name)}} <small>{{__('('.$karyawan->email.')')}}</small></h4>
                    <small>{{__($karyawan->no_karyawan)}}</small>
                    <div class="d-flex">
                        <a href="{{ route('edit_karyawan', ['id'=>$karyawan->id]) }}"
                            class="text-dark"><small>Edit</small></a>
                        <a href="#" class="ml-2 text-danger" data-toggle="modal"
                            data-target="{{__("#delete_".$karyawan->id)}}"><small>Delete</small></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
</div>
@endsection

@section('modal')
@foreach ($karyawans as $karyawan)
<div class="modal fade" id={{__('delete_'.$karyawan->id)}} tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Data Karyawan
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
                <form action="{{ route('delete_karyawan') }}" method="POST" class="w-100">
                    @method('delete')
                    @csrf
                    <input type="text" name="id" hidden value="{{__($karyawan->id)}}">
                    <button type="submit" class="btn btn-danger w-100">HAPUS</button>
                </form>
                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

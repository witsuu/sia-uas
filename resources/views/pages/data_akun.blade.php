@extends('layouts.master')

@section('title','Data Akun')
@section('nama_menu','Data Akun')

@section('content')
@if (session()->has('success')||session()->has('edited')||session()->has('deleted'))
<div class="position-absolute" id="layer-toast" aria-live="polite" aria-atomic="true"
    style="z-index:1000; min-height: 200px;width: 300px;right:0">
    <div class="toast" id="toast-success" data-delay="5000">
        <div class="toast-header bg-success text-white">
            <strong class="mr-auto">Success</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span>
            </button>
        </div>
        <div class="toast-body bg-light">
            {{__(session()->get('success'))}}
            {{__(session()->get('edited'))}}
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
    <div class="card-header text-right">
        <div></div>
        <a href="{{ route('tambah_data_akun') }}"><button class="btn btn-primary">Tambah Akun</button></a>
    </div>
    <div class="card-body">
        <table id="dataTable" class="table align-items-center table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Akun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($akuns as $akun)
                <tr>
                    <td>{{__($no)}}</td>
                    <td>{{__($akun->kode_akun)}}</td>
                    <td>{{__($akun->nama_akun)}}</td>
                    <td>
                        <button class="btn btn-secondary" data-toggle="modal"
                            data-target="{{__("#edit_".$akun->kode_akun)}}">Edit</button>
                        <button class="btn btn-danger" data-toggle="modal"
                            data-target="{{__("#delete_".$akun->kode_akun)}}">Hapus</button>
                    </td>
                </tr>
                @php
                $no+=1;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('modal')
@foreach ($akuns as $akun)
<div class="modal fade" id="{{__("edit_".$akun->kode_akun)}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("Edit ".$akun->nama_akun)}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('edit_data_akun')}}" method="post">
                @method('PUT')
                @csrf
                <input type="text" name="id" hidden value="{{__($akun->id)}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" name="kode_akun" value="{{__($akun->kode_akun)}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Akun</label>
                        <input type="text" name="nama_akun" value="{{__($akun->nama_akun)}}" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-primary">SIMPAN PERUBAHAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id={{__('delete_'.$akun->kode_akun)}} tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Postingan
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
                <form action="{{ route('hapus_data_akun') }}" method="POST" class="w-100">
                    @method('delete')
                    @csrf
                    <input type="text" name="id" hidden value="{{__($akun->id)}}">
                    <button type="submit" class="btn btn-danger w-100">HAPUS</button>
                </form>
                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">TUTUP</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

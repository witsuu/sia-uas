<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\Transaksi;
use Auth;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct (){
        $this->middleware('auth');
    }

    public function dashboard(){
        $page = "dashboard";
        $role = Auth::user()->role;

        return view('dashboard',compact('page','role'));
    }

    public function users(){
        $page="user";
        $role = Auth::user()->role;
        if ($role !="owner") {
            redirect()->route('dashboard');
        }

        return view('pages.users',compact('page','role'));
    }

    public function dataAkun(){
        $page="data_akun";
        $role = Auth::user()->role;
        if($role == "owner"){
            return redirect()->route('dashboard');
        }

        $akuns = Akun::all();

        return view('pages.data_akun',compact('page','akuns','role'));
    }

    public function tambahDataAkun(){
        $page="data_akun";
        $role = Auth::user()->role;
        if($role == "owner"){
            return redirect()->route('dashboard');
        }

        return view("pages.tambah_data_akun", compact('page','role'));
    }

    public function storeDataAkun(Request $req){
        $role = Auth::user()->role;
        if($role == "owner"){
            return redirect()->route('dashboard');
        }

        Akun::create([
            'kode_akun'=>$req->kode_akun,
            'nama_akun'=>$req->nama_akun,
        ]);

        return redirect()->route('data_akun')->with('success','Akun Berhasil Ditambahkan');
    }

    public function editDataAkun(Request $req){
        $id = $req->id;

        $akun = Akun::find($id);
        $akun->kode_akun = $req->kode_akun;
        $akun->nama_akun = $req->nama_akun;

        $akun->save();

        return redirect()->route('data_akun')->with('edited',`Akun berhasil diubah`);
    }

    public function deleteDataAkun(Request $req){
        $id = $req->id;

        $akun = Akun::find($id);
        $akun->delete();

        return redirect()->route('data_akun')->with('deleted','Akun berhasil dihapus');
    }

    public function jurnalUmumMain(){
        $page="jurnal_umum";
        $role = Auth::user()->role;

        $jurnals = Transaksi::getTransaksiByMonthAndYear();

        return view('pages.jurnal_umum_main', compact('page','jurnals','role'));
    }

    public function jurnalUmum(Request $req){
        $page="jurnal_umum";
        $role = Auth::user()->role;

        $bulan = $req->bulan;
        $tahun = $req->tahun;

        $details = Transaksi::getJurnalJoinAkunDetail($bulan,$tahun);

        return view('pages.jurnal_umum', compact("page",'details','role'));
    }

    public function tambahJurnalUmum(){
        $page="jurnal_umum";
        $role = Auth::user()->role;
        if($role == "owner"){
            return redirect()->route('dashboard');
        }

        $akuns = Akun::all();

        return view('pages.tambah_jurnal_umum', compact('page','akuns','role'));
    }

    public function storeJurnalUmum(Request $req){
        $role = Auth::user()->role;
        if($role == "owner"){
            return redirect()->route('dashboard');
        }

        Transaksi::create([
            'id_user'=>Auth::user()->id,
            'tanggal_transaksi'=>$req->tanggal,
            'kode_akun'=>$req->kode_akun,
            'jenis_saldo'=>$req->jenis_saldo,
            'saldo'=>$req->saldo,
        ]);

        return redirect()->route('jurnal_umum_main')->with('success','Transaksi berhasil ditambahkan');
    }

    public function editJurnalUmumPage(Request $req){
        $page="jurnal_umum";
        $id = $req->id;
        $role = Auth::user()->role;

        $transaksi = Transaksi::find($id);

        return view('pages.edit_jurnal_umum',compact('page','role','transaksi'));
    }

    public function editJurnalUmum(Request $req){
        $id = $req->id;

        $transaksi = Transaksi::find($id);
        $transaksi->tanggal_transaksi = $req->tanggal_transaksi;
        $transaksi->jenis_saldo = $req->jenis_saldo;
        $transaksi->saldo = $req->saldo;

        $transaksi->save();

        return redirect()->route('jurnal_umum_main')->with('updated',`Transaksi berhasil diubah`);
    }

    public function deleteJurnalUmum(Request $req){
        $id = $req->id;

        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect()->route('jurnal_umum_main')->with('deleted','Transaksi berhasil dihapus');
    }

    public function bukuBesarMain(){
        $page="buku_besar";
        $role = Auth::user()->role;

        $transaksiByMonthAndYear = Transaksi::getTransaksiByMonthAndYear();

        return view('pages.buku_besar_main', compact('page','transaksiByMonthAndYear','role'));
    }

    public function bukuBesar(Request $req){
        $page="buku_besar";
        $role = Auth::user()->role;

        $bulan = $req->bulan;
        $tahun = $req->tahun;

        $details = Transaksi::getJurnalJoinAkunDetail($bulan,$tahun);
        $akuns = Akun::getAkunByMonthAndYear($bulan,$tahun);

        return view('pages.buku_besar', compact('page','details','akuns','role'));
    }

    public function neracaMain(){
        $page="neraca";
        $role = Auth::user()->role;

        $transaksiByMonthAndYear = Transaksi::getTransaksiByMonthAndYear();

        return view('pages.neraca_main', compact('page','transaksiByMonthAndYear','role'));
    }

    public function neraca(Request $req){
        $page="neraca";
        $role = Auth::user()->role;

        $bulan = $req->bulan;
        $tahun = $req->tahun;

        $details = Transaksi::getJurnalJoinAkunDetail($bulan,$tahun);
        $akuns = Akun::getAkunByMonthAndYear($bulan,$tahun);

        return view('pages.neraca', compact('page','details','akuns','role'));
    }

    public function Laporan(){
        $page="laporan";
        $role = Auth::user()->role;

        $transaksiByMonthAndYear = Transaksi::getTransaksiByMonthAndYear();

        return view('pages.laporan', compact('page','transaksiByMonthAndYear','role'));
    }
}

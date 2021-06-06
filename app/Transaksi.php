<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'id_user','kode_akun','tanggal_transaksi','jenis_saldo','saldo',
    ];

    public static function getTransaksiByMonthAndYear(){
        return DB::table('transaksi')
        ->select('tanggal_transaksi')
        ->groupBy(DB::raw('YEAR(tanggal_transaksi)'))
        ->groupBy(DB::raw('MONTH(tanggal_transaksi)'))
        ->orderBy('tanggal_transaksi','desc')
        ->get();
    }

    public static function getJurnalJoinAkunDetail($bulan,$tahun){
        return DB::table('transaksi')
        ->select('transaksi.*','akun.nama_akun','akun.kode_akun')
        ->where(DB::raw('YEAR(tanggal_transaksi)'),$tahun)
        ->where(DB::raw('MONTH(tanggal_transaksi)'),$bulan)
        ->join('akun','transaksi.kode_akun',"=",'akun.kode_akun')
        ->orderBy('tanggal_transaksi','asc')
        ->get();
    }
}

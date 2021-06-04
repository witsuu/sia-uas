<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Akun extends Model
{
    protected $table = "akun";

    protected $fillable = [
        'kode_akun','nama_akun'
    ];

    public static function getAkunByMonthAndYear($bulan,$tahun){
        return DB::table('transaksi')
        ->select('transaksi.tanggal_transaksi','akun.nama_akun','akun.kode_akun')
        ->where(DB::raw('YEAR(tanggal_transaksi)'),$tahun)
        ->where(DB::raw('MONTH(tanggal_transaksi)'),$bulan)
        ->join('akun','transaksi.kode_akun',"=",'akun.kode_akun')
        ->groupBy('akun.nama_akun')
        ->orderBy('tanggal_transaksi','asc')
        ->get();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\User;
use Auth;
use Image;
use Hash;

class OwnerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function karyawan(){
        $page="user";
        $user = Auth::user();
        if ($user->role !="owner") {
            redirect()->route('dashboard');
        }

        $karyawans = User::where('role','karyawan')->latest()->get();

        return view('pages.karyawan',compact('page','user','karyawans'));
    }

    public function tambahKaryawan(){
        $page = "user";
        $user = Auth::user();

        return view('pages.tambah_karyawan', compact('page','user'));
    }

    public function storeKaryawan(Request $req){
        $req->validate([
            'password'=>'required|min:8',
        ]);

        $file = $req->file('foto');
        $filename = time()."_".$file->getClientOriginalName();
        $path = "assets/profiles/";

        $img = Image::make($file->getRealPath());
        $img->resize(300,300)->save($path.$filename);

        User::create([
            'name'=>$req->nama,
            'email'=>$req->email,
            'no_karyawan'=>$req->no_karyawan,
            'foto'=>$path.$filename,
            'password'=> Hash::make($req->password),
            'role'=>"karyawan",
        ]);
        
        return redirect()->route('karyawan')->with('success','Karyawan Berhasil Ditambahkan');
    }

    public function editKaryawan($id){
        $page = "user";
        $user = Auth::user();

        $karyawan = User::find($id);

        return view('pages.edit_karyawan',compact('page','user','karyawan'));
    }

    public function storeEditKaryawan(Request $req){
        $id = $req->id;

        $karyawan = User::find($id);

        $karyawan->name = $req->nama;
        $karyawan->email = $req->email;
        $karyawan->no_karyawan = $req->no_karyawan;

        $karyawan->save();

        return redirect()->route('karyawan')->with('success','Data Karyawan berhasil diubah');
    }

    public function deleteKaryawan(Request $req){
        $id = $req->id;

        $karyawan = User::find($id);
        if (file_exists($karyawan->foto)) {
            unlink($karyawan->foto);
        }
        $karyawan->delete();

        return redirect()->route('karyawan')->with('success','Data Karyawan berhasil dihapus');
    }
}

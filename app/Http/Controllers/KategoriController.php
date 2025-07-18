<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function GetKategori()
    {
        $title = "Kategori Buku";
        $data = Kategori::all();

        if(Auth::user()->role =='admin'){
            return view('kategoris.index', compact(['title', 'data']));
        }else {
            echo "Anda tidak memiliki akses";
        }
    }
    public function viewTambah()
    {
        $title = "Tambah Kategori Buku";
        return view('kategoris.tambah', compact('title'));
    }
    public function TambahData(Request $request)
    {
        Validator([
            'nama_kategori'=>'required'
        ]);
        $data = new Kategori([
            'nama_kategori'=>$request->nama_kategori
        ]);
        $data->save();
        return redirect('/kategori');
    }
    public function viewUpdate($id)
    {
        $title = "Update Kategori Buku";
        $data = Kategori::where('id_kategori',$id)->first();
        return view('kategoris.edit', compact(['title','data']));
    }
    public function UpdateData(Request $request)
    {
        Validator([
            'nama_kategori'=>'required'
        ]);
        $data = [
            'nama_kategori'=>$request->nama_kategori
        ];
        Kategori::where('id_kategori',$request->id_kategori)->update($data);
        return redirect('/kategori');
    }
    public function Delete($id){
        Kategori::where('id_kategori',$id)->delete();
        return redirect('/kategori');
    }
}

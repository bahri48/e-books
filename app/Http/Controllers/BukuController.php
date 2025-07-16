<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function getBuku()
    {
        $data = Buku::with('JoinToKategori')->get();
        // dd($data);
        return view('buku.index', compact(['data']));
    }
    public function viewTambah()
    {
        $kategori = Kategori::select('id_kategori', 'nama_kategori')->get();
        return view('buku.tambah', compact(['kategori']));
    }
    public function TambahBuku(Request $request)
    {
        Validator([
            'id_kategori' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_halaman' => 'required',
            'abstrak' => 'required',
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
        $filePath = null;
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $getFileName = $file->hashName();
            $filePath = "/assets/image/cover_buku/$getFileName";
            $file->move(public_path('/assets/image/cover_buku/'), $getFileName);
        }
        $data = new Buku([
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_halaman' => $request->jumlah_halaman,
            'abstrak' => $request->abstrak,
            'cover' => $filePath,
        ]);
        $data->save();
        return redirect()->intended('/books')->with('success', 'Buku berhasil disimpan');
    }

    public function viewUpdate($id)
    {
        $kategori = Kategori::select('id_kategori', 'nama_kategori')->get();
        $buku = Buku::with('JoinToKategori')->where('id_buku', $id)->first();
        // dd($buku);
        return view('buku.edit', compact(['kategori', 'buku']));
    }
 
    public function UpdateBuku(Request $request)
    {
        $existing = Buku::where('id_buku', $request->id_buku)->firstOrFail();
        Validator([
            'id_kategori' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_halaman' => 'required',
            'abstrak' => 'required',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $filePath = $existing->cover;
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $getFileName = $file->hashName();
            $filePath = "/assets/image/cover_buku/$getFileName";
            $file->move(public_path('/assets/image/cover_buku/'), $getFileName);
        }
        $existing->update([
            'id_kategori'     => $request->id_kategori,
            'judul'           => $request->judul,
            'penulis'         => $request->penulis,
            'tahun_terbit'    => $request->tahun_terbit,
            'jumlah_halaman'  => $request->jumlah_halaman,
            'abstrak'         => $request->abstrak,
            'cover'           => $filePath,
        ]);
        return redirect()->intended('/books')->with('success', 'Buku berhasil diupdate');
    }
    public function deleteBuku($id)
    {
    $buku = Buku::where('id_buku', $id)->first();
        if ($buku) {
            if ($buku->foto && file_exists(public_path($buku->foto))) {
                unlink(public_path($buku->foto));
            }
            $buku->delete();
            return redirect()->intended('/books')->with('success', 'Kegiatan berhasil dihapus');
        }
        return redirect()->intended('/kegiatan')->with('error', 'Data kegiatan tidak ditemukan');
    }
}

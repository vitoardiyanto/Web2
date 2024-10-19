<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ViewProduk()
    {
        $produk = Produk::all();//mengambil semuadata di table produk
        return view('produk',['produk'=> $produk]); //menampilkan view dari produk.blade.php dengan membawa variabel $produk
    }
    public function CreateProduk(Request $request)
    {
        $ImageName = null;
        if($request->hasFile('image')){
            $ImageFile = $request->file('image');
            $ImageName = time() . '_' . $ImageFile->getClientOriginalName();
            $ImageFile->storeAs('public/images', $ImageName);
        }

        Produk::create([
            'nama_produk'=> $request->nama_produk,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,
            'jumlah_produk'=> $request->jumlah_produk,
            'image' => $ImageName
        ]);

    return redirect('/produk');
}
public function ViewAddproduk()
{
    return view('addproduk');//menampilkan view dari addproduk.blade.php }
}
public function DeleteProduk($kode_produk)
{
    Produk :: where('kode_produk', $kode_produk)->delete();

    return redirect('/produk');
}

//fungsi untuk view edit produk
public function ViewEditProduk($kode_produk)
{
    $ubahproduk = Produk::where('kode_produk',$kode_produk)->first();

    return view('editproduk',compact('ubahproduk'));
}
//fungsi untuk mengubah data produk
public function UpdateProduk(Request $request,$kode_produk)
{
    $ImageName = null;
        if($request->hasFile('image')){
            $ImageFile = $request->file('image');
            $ImageName = time() . '_' . $ImageFile->getClientOriginalName();
            $ImageFile->storeAs('public/images', $ImageName);
        }
    Produk::where('kode_produk', $kode_produk)->update([
        'nama_produk' => $request->nama_produk,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'jumlah_produk' => $request->jumlah_produk,
        'image' => $ImageName
    ]);

    return redirect('/produk');
}
}


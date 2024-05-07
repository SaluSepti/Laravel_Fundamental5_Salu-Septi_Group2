<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Users;
use App\Models\Profile;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('product')->with('product', $product);
    }


    public function show()
    {
        $product = Product::all();
        return view('list-product')->with('product', $product);
    }


    public function create()
    {
        $product = new Product();
        return view('form')->with('product', $product);
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama_produk' => 'required|string',
            'berat' => 'required|numeric',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'kondisi' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|url'
        ],
        [
            'gambar.required' => 'Error, URL Gambar wajib diisi.',
            'nama_produk.required' => 'Error, Nama Produk wajib diisi.',
            'berat.required' => 'Error, Berat wajib diisi.',
            'harga.required' => 'Error, Harga wajib diisi.',
            'stok.required' => 'Error, Stok wajib diisi.',
            'kondisi.required' => 'Error, Kondisi wajib diisi.',
            'deskripsi.required' => 'Error, Deskripsi wajib diisi.',
        ]);


        $product = new Product();
        $product->nama_produk = $request->nama_produk;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->kondisi = $request->kondisi;
        $product->deskripsi = $request->deskripsi;
        $product->gambar = $request->gambar;
        $product->save();

        return redirect()->route('list-product.show')->with('success', 'Produk berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('/form')->with('product', $product);
    }

    public function update(Request $request, Product $product) {
    try  {
        // Validasi input
        $request->validate([
            'image' => 'required',
            'nama_produk' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kondisi' => 'required|boolean',
            'deskripsi' => 'required',
        ]);

         //Update data produk
        $product->nama_produk = $request->nama_produk;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->kondisi = $request->kondisi;
        $product->deskripsi = $request->deskripsi;
        $product->gambar = $request->gambar;
        $product->save();

        return redirect()->route('product.update')->with('success', 'Berhasil Update Data');
        } catch (\Exception $e) {
        //Tangani kesalahan
        return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage());
    }
}

    public function destroy($id) 
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('list-product.show')->with('success', 'Produk berhasil dihapus!');
    }

    public function showIndex()
    {
        $users = Users::latest()->get();

        return view('profile', compact('users'));
    }

    public function profile()
    {
        $user = new Users();
        $user->nama_akun= 'Admin Amandemy';
        $user->email = 'Admin.amandemy@gmail.com';
        $user->gender= 'male';
        $user->umur= '23';
        $user->tanggal_lahir= '1986-05-20';
        $user->alamat= 'Jalan Kenanga 3 Blok DB 4 No 101';
        $user->save();
    

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->nama_toko = 'Amandemy Drink';
        $profile->rate = '4';
        $profile->produk_terbaik = 'Mint choco';
        $profile->deskripsi = 'Toko ini menyediakan banyak sekali variasi minuman yang harganya terjangkau dan rasanya nikmat';

        $profile->users()->associate($user);
    
       // Save the profile
        $profile->save();
    }

}  
        




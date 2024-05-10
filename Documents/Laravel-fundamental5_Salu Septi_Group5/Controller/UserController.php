<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use stdClass;

class UserController extends Controller
{

    public function index(Request $request)
    {
        return view('index');
    }

    public function callSession(Request $request)
    {
        return redirect()->back()->with('status', 'Berhasil memanggil sesi');
    }

    public function getAdmin(User $user)
    {
         $products = Product::all();
        //$products = Product::where('user_id', $user->id)->get();
        return view('admin_page', ['products' => $products, 'user' => $user]);
    }

    public function editProduct(Request $request, User $user, Product $product)
    {
        return view('edit_product', ['product' => $product, 'user' => $user]);
    }

    public function updateProduct(Request $request, User $user, Product $product)
    {
        if (!$request->filled('image')) {
            return redirect()->back()->with('error', 'Error. Field Gambar wajib diisi.');
        } else if (!$request->filled('nama')) {
            return redirect()->back()->with('error', 'Error. Field Nama wajib diisi.');
        } else if (!$request->filled('berat')) {
            return redirect()->back()->with('error', 'Error. Field Berat wajib diisi.');
        } else if (!$request->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga wajib diisi.');
        } else if (!$request->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok wajib diisi.');
        } else if ($request->kondisi === 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi wajib diisi.');
        } else if (!$request->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi wajib diisi.');
        }

        if ($product->user_id === $user->id) {
            $product->name = $request->nama;
            $product->stock = $request->stok;
            $product->weight = $request->berat;
            $product->price = $request->harga;
            $product->description = $request->deskripsi;
            $product->condition = $request->kondisi;
            $product->image = $request->image;
            $product->save();
        }

        return redirect()->route('admin_page', ['user' => $user->id])->with('message', 'Berhasil update data');
    }

    public function deleteProduct(Request $request, User $user, Product $product)
    {
        if ($product->user_id === $user->id) {
            $product->delete();
        }
        return redirect()->back()->with('status', 'Berhasil menghapus data');
    }



    public function show(Request $request)
    {
        $varInsert = "Halo ini adalah variable yang disisipkan";
        $varOther = "Variable ini merupakan variable lain yang disisipkan";
        return view('show', compact('varInsert', 'varOther'));
    }


    public function getFormRequest()
    {
        return view('form_request');
    }

    public function sendRequest(Request $request)
    {
        dd($request->gender);
    }


     public function handleRequest(Request $request, User $user)
    {
        return view('handle_request', ['user' => $user]);
    }


    public function postRequest(PostCreateRequest $request)
    {   
    if (!$request->filled('image')) {
            return redirect()->back()->with('error', 'Error. Field Gambar wajib diisi.');
        } else if (!$request->filled('nama')) {
            return redirect()->back()->with('error', 'Error. Field Nama wajib diisi.');
        } else if (!$request->filled('berat')) {
            return redirect()->back()->with('error', 'Error. Field Berat wajib diisi.');
        } else if (!$request->filled('harga')) {
            return redirect()->back()->with('error', 'Error. Field Harga wajib diisi.');
        } else if (!$request->filled('stok')) {
            return redirect()->back()->with('error', 'Error. Field Stok wajib diisi.');
        } else if ($request->kondisi === 0) {
            return redirect()->back()->with('error', 'Error. Field Kondisi wajib diisi.');
        } else if (!$request->filled('deskripsi')) {
            return redirect()->back()->with('error', 'Error. Field Deskripsi wajib diisi.');
        }

        Product::create([
            'user_id' => $user->id,
            'image' => $request->image,
            'name' => $request->nama,
            'weight' => $request->berat,
            'price' => $request->harga,
            'condition' => $request->kondisi,
            'stock' => $request->stok,
            'description' => $request->deskripsi,
        ]);

        // return redirect()->route('get_product');
        return redirect()->route('admin_page', ['user' => $user->id]);
    }

    public function getProduct()
    {
        $data = Product::all();
        //$user = user::find(1);
        //$data = $user->products;
           // Contoh inisialisasi variabel dengan objek
          // $user = new User();
          // $products = $user->products;
        //return view('list_product')->with('products', $data);
        return view('products')->with('products', $data);
    
    }


    public function getProfile(Request $request, User $user)
    {
        $user = User::with('profile')->find($user->id);
        // dd($user);
        return view('profile', ['user' => $user]);
    }


}

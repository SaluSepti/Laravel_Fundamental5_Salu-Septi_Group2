@extends('layouts.master')

@section('content')

    <div class="container w-50 p-3 mt-2 fw-medium">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin-bottom: 0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <div class="bg-info p-3 rounded">
            <h3 class="text-center"><strong>Form Produk</strong></h3>
           <form id="product-form"
                @if(isset($product->id))
                    action="{{ route('product.update', $product->id) }}"
                @else
                    action="{{ route('product.store') }}"
                @endif
                method="POST" enctype="multipart/form-data">

                @csrf

                @if(isset($product->id))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="gambar" class="form-label">URL Gambar</label>
                    <input type="text" class="form-control" id="gambar" name="gambar" value="{{ old('gambar', $product->gambar) }}">
                </div>

                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}">
                </div>

                <div class="mb-3">
                    <label for="berat" class="form-label">Berat</label>
                    <input type="number" class="form-control" id="berat" name="berat" value="{{ old('berat', $product->berat) }}">
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $product->harga) }}">
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok', $product->stok) }}">
                </div>

                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <select class="form-select" id="kondisi" name="kondisi">
                        <option value=""  selected disabled>Pilih Kondisi Barang</option>
                        <option value="Bekas" {{ $product->kondisi == 'Bekas' ? 'selected' : '' }}>Bekas</option>
                        <option value="Baru" {{ $product->kondisi == 'Baru' ? 'selected' : '' }}>Baru</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-dark">
                        @if(isset($product->id))
                            Update
                        @else
                            Submit
                        @endif
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@extends('layouts.master')

@section('content')

    <div class="container px-1 py-1 ">
        <div class="bg-info p-3 rounded">
            <div class="d-flex justify-content-between text-center mb-2 p-3">
                <div class="">
                    <h2>List Product</h2>
                </div>
                <div class="align-items-end">
                    <a href="{{ route('profile.index') }}" class="btn btn-primary">Lihat Profil</a>
                    <a href="{{ route('product.create') }}" class="btn btn-dark">Tambah Produk</a>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Kembali ke Produk</a>
                </div>
            </div>

            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Berat</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $nomor = 1;
                    @endphp
                    @foreach ($product as $p)
                        <tr >
                            <th scope="row">{{ $nomor }}.</th>
                            <td >{{ $p->nama_produk }}</td>
                            <td>{{ $p->stok }}</td>
                            <td>{{ $p->berat }} Kg</td>
                            <td>Rp. {{ $p->harga }}</td>
                            <td>{{ $p->kondisi }}</td>
                            <td style="width: 15%;">
                                <div>
                                    <a href="{{ route('product.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('product.destroy', $p->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @php
                            $nomor++;
                        @endphp
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .letter-box {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
            margin-top: 50px; /* Menambahkan margin-top untuk memindahkan ke bawah */
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="letter-box">
                    <div class="card">
                        <div class="card-header">
                            Profil Pengguna
                        </div>
                        <div class="card-body">
                            @foreach($users as $users)
                                <p>Nama Akun: {{ $users->nama_akun }}</p>
                                <p>Email: {{ $users->email }}</p>
                                <!-- Tambahkan data dari UserProfile -->
                                <p>Gender: {{ $users->gender }}</p>
                                <p>Umur: {{ $users->umur }}</p>
                                <p>Tanggal Lahir: {{ $users->tanggal_lahir }}</p>
                                <p>Alamat: {{ $users->alamat }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mx-auto">
                <div class="letter-box">
                    <div class="card">
                        <div class="card-header">
                            Profil Toko
                        </div>
                        <div class="card-body">
                            <!-- Isian dari database -->
                            <!-- Pastikan hubungan model dan relasinya sudah benar -->
                            @foreach($users as $users)
                                @if($users->Profile)
                                    <p>Nama Toko: {{ $users->profile->nama_toko }}</p>
                                    <p>Rate: {{ $users->profile->rate }}</p>
                                    <p>Produk Terbaik: {{ $users->profile->produk_terbaik }}</p>
                                    <p>Deskripsi: {{ $users->profile->deskripsi }}</p>
                                @else
                                    <p>Toko tidak ditemukan.</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{ route('list-product.show') }}" class="btn btn-success">Kembali ke Halaman Admin</a> <!-- Tombol kembali -->
            </div>
        </div>
    </div>
</body>
</html>

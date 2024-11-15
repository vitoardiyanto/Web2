@extends('layouts.mainDashboard')
@section('editProduk')
    <div class="title">
        <h1 class="h1">Edit Produk</h1>
        <p>Perbarui informasi produk yang ingin diedit</p>
    </div>

    <form action="{{ route(Auth::user()->role. 'produk.update', $produk->kode_produk) }}" method="POST" enctype="multipart/form-data" class="container mt-5">
        @csrf
        @method('PUT')

        <!-- Nama Produk -->
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Produk:</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ $produk->nama_produk }}" required>
        </div>

        <!-- Deskripsi Produk -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi produk" rows="3" required>{{ $produk->deskripsi }}</textarea>
        </div>

        <div class="row">
            <!-- Harga Produk -->
            <div class="col-md-6 mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" name="harga" id="harga" class="form-control" value="{{ $produk->harga }}" placeholder="Masukkan harga produk" required>
            </div>

            <!-- Jumlah Produk -->
            <div class="col-md-6 mb-3">
                <label for="jumlah_produk" class="form-label">Jumlah Produk:</label>
                <input type="number" name="jumlah_produk" id="jumlah_produk" class="form-control" value="{{ $produk->jumlah_produk }}" placeholder="Masukkan jumlah produk" required>
            </div>
        </div>

        <!-- Gambar Produk -->
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk:</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($produk->image)
                <div class="mt-2">
                    <img src="{{ asset($produk->image) }}" alt="{{ $produk->nama_produk }}" class="img-thumbnail" style="max-width: 100px; height: auto;">
                </div>
            @endif
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Update Produk</button>
    </form>
@endsection

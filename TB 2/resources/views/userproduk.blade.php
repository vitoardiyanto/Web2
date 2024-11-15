@extends('layouts.mainDashboard')
@section('userProduk')
    <div class="title">
        <h1 class="h1">Daftar Produk</h1>
        <p>Temukan produk terbaik untuk kebutuhan Anda</p>
        <a href="/inputProduk"><button class="card-button">Tambah Data</button></a>
    </div>

    <!-- Card Produk -->
    <div class="product-grid">
        @foreach ($produk as $items)
        <div class="product-card">
            @if($items->image)
                <img src="{{ asset($items->image) }}" alt="{{ $items->nama_produk }}" style="max-width: 200px; height: auto;">
            @else
                <img src="https://via.placeholder.com/200" alt="Produk Default">
            @endif
            <h3>{{ $items->nama_produk }}</h3>
            <p class="price">{{ $items->harga }}</p>
            <p class="description">{{ $items->deskripsi }}</p>

            <div class="btnEditDel ml-3 d-flex justify-center items-center gap-2">
                <a href="{{ route(Auth::user()->role. 'produk.edit', $items->kode_produk) }}">
                    <button class="card-button">Edit</button>
                </a>

                <form action="{{ route(Auth::user()->role. 'produk.destroy', $items->kode_produk) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button class="button-delete">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection

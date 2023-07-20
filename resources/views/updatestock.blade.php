@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        <h1>Update Stock Barang</h1>

        <form action="{{ route('stock.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jumlah_barang">Jumlah Barang</label>
                <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="berat">Berat</label>
                <input type="number" name="berat" id="berat" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="satuan">Satuan</label>
                <select name="satuan" id="satuan" class="form-control" required>
                    <option value="0">Gram</option>
                    <option value="1">Kilogram</option>
                </select>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="foto_barang">Foto Barang</label>
                <input type="file" name="foto_barang" id="foto_barang" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Tambah Stock</button>
        </form>

        <div class="mt-4">
            <h2>Daftar Stock Barang</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Berat</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $stock)
                        <tr>
                            <td>{{ $stock->id_barang }}</td>
                            <td>{{ $stock->nama_barang }}</td>
                            <td>{{ $stock->jumlah_barang }}</td>
                            <td>{{ $stock->berat }}</td>
                            <td>{{ $stock->satuan ? 'Kilogram' : 'Gram' }}</td>
                            <td>{{ $stock->harga }}</td>
                            <td>
                                @if ($stock->foto_barang)
                                    <img src="{{ asset($stock->foto_barang) }}" alt="Foto Barang" class="img-thumbnail" width="50">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('stock.edit', $stock->id_barang) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('stock.destroy', $stock->id_barang) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

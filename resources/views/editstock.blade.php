@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">Update Stock Barang</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('stock.update', $stock->id_barang) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nama_barang" class="col-md-4 col-form-label text-md-right">Nama Barang</label>

                                <div class="col-md-6">
                                    <input id="nama_barang" type="text" class="form-control" name="nama_barang" required autofocus value="{{ $stock->nama_barang }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jumlah_barang" class="col-md-4 col-form-label text-md-right">Jumlah Barang</label>

                                <div class="col-md-6">
                                    <input id="jumlah_barang" type="number" class="form-control" name="jumlah_barang" required value="{{ $stock->jumlah_barang }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="berat" class="col-md-4 col-form-label text-md-right">Berat</label>

                                <div class="col-md-6">
                                    <input id="berat" type="number" class="form-control" name="berat" required value="{{ $stock->berat }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="satuan" class="col-md-4 col-form-label text-md-right">Satuan</label>

                                <div class="col-md-6">
                                    <select id="satuan" class="form-control" name="satuan" required>
                                        <option value="0" {{ $stock->satuan == 0 ? 'selected' : '' }}>Gram</option>
                                        <option value="1" {{ $stock->satuan == 1 ? 'selected' : '' }}>Kilogram</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="harga" class="col-md-4 col-form-label text-md-right">Harga</label>

                                <div class="col-md-6">
                                    <input id="harga" type="number" class="form-control" name="harga" required value="{{ $stock->harga }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="foto_barang" class="col-md-4 col-form-label text-md-right">Foto Barang</label>

                                <div class="col-md-6">
                                    <input id="foto_barang" type="file" class="form-control" name="foto_barang">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Stock
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

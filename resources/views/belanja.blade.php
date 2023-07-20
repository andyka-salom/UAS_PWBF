
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <div class="container">
        <h1>Form Belanja</h1>

        <form action="{{ route('belanja.pesan') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label for="cabang">Cabang</label>
                <select name="cabang" id="cabang" class="form-control">
                    @foreach ($cabang as $item)
                        <option value="{{ $item->id_penangkaran }}">{{ $item->lokasi_penangkaran }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="barang">Barang</label>
                <select name="barang" id="barang" class="form-control">
                    <!-- Barang options will be populated dynamically based on the selected cabang -->
                </select>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Pemesanan</label>
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="jumlah_tersedia">Jumlah Tersedia</label>
                <input type="text" name="jumlah_tersedia" id="jumlah_tersedia" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="gambar">Gambar</label>
                <img id="gambar" src="#" alt="Gambar Barang" class="img-thumbnail" width="100">
            </div>

            <div class="form-group">
                <label for="alamat_pengiriman">Alamat Pengiriman</label>
                <input type="text" name="alamat_pengiriman" id="alamat_pengiriman" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tgl_pemesanan">Tanggal Pemesanan</label>
                <input type="date" name="tgl_pemesanan" id="tgl_pemesanan" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                <input type="date" name="tgl_pengiriman" id="tgl_pengiriman" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="satuan">Satuan</label>
                <select name="satuan" id="satuan" class="form-control" required>
                    <option value="ekor">Ekor</option>
                    <option value="kg">Kilogram</option>
                </select>
            </div>

            <div class="form-group">
                <label for="total_pembayaran">Total Pembayaran</label>
                <input type="text" name="total_pembayaran" id="total_pembayaran" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="bukti_tf">Bukti Transfer</label>
                <input type="file" name="bukti_tf" id="bukti_tf" class="form-control-file" required>
            </div>

            <div class="form-group">
                <label for="nomor_rekening">Nomor Rekening Cabang</label>
                <input type="text" name="nomor_rekening" id="nomor_rekening" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Pesan</button>
        </form>
    </div>

    <script>
        // Fetch barang based on selected cabang
        document.getElementById('cabang').addEventListener('change', function() {
            var cabangId = this.value;
            var barangSelect = document.getElementById('barang');
            var deskripsiInput = document.getElementById('deskripsi');
            var hargaInput = document.getElementById('harga');
            var jumlahTersediaInput = document.getElementById('jumlah_tersedia');
            var gambarImg = document.getElementById('gambar');
            var totalPembayaranInput = document.getElementById('total_pembayaran');
            var nomorRekeningInput = document.getElementById('nomor_rekening');

            // Clear previous options
            barangSelect.innerHTML = '';
            deskripsiInput.value = '';
            hargaInput.value = '';
            jumlahTersediaInput.value = '';
            gambarImg.src = '#';
            totalPembayaranInput.value = '';
            nomorRekeningInput.value = '';

            // Fetch barang data from the server
            fetch('/fetch-barang/' + cabangId)
                .then(response => response.json())
                .then(data => {
                    // Populate barang options
                    data.forEach(function(barang) {
                        var option = document.createElement('option');
                        option.value = barang.id_barang;
                        option.textContent = barang.nama_barang;
                        barangSelect.appendChild(option);
                    });
                });
        });

        // Update deskripsi, harga, jumlah tersedia, gambar, total pembayaran, and nomor rekening when barang is selected
        document.getElementById('barang').addEventListener('change', function() {
            var barangId = this.value;
            var deskripsiInput = document.getElementById('deskripsi');
            var hargaInput = document.getElementById('harga');
            var jumlahTersediaInput = document.getElementById('jumlah_tersedia');
            var gambarImg = document.getElementById('gambar');
            var totalPembayaranInput = document.getElementById('total_pembayaran');
            var nomorRekeningInput = document.getElementById('nomor_rekening');

            // Fetch barang data from the server
            fetch('/fetch-barang-detail/' + barangId)
                .then(response => response.json())
                .then(data => {
                    deskripsiInput.value = data.deskripsi;
                    hargaInput.value = data.harga;
                    jumlahTersediaInput.value = data.jumlah_tersedia;
                    gambarImg.src = data.gambar;
                    nomorRekeningInput.value = data.nomor_rekening;

                    // Calculate total pembayaran
                    var jumlahInput = document.getElementById('jumlah');
                    var harga = parseFloat(data.harga);
                    var jumlah = parseInt(jumlahInput.value);
                    var totalPembayaran = harga * jumlah;
                    totalPembayaranInput.value = totalPembayaran.toFixed(2);

                    // Set nomor rekening
                    nomorRekeningInput.value = data.nomor_rekening;
                });
        });

        // Update total pembayaran when jumlah is changed
        document.getElementById('jumlah').addEventListener('change', function() {
            var hargaInput = document.getElementById('harga');
            var jumlahInput = document.getElementById('jumlah');
            var totalPembayaranInput = document.getElementById('total_pembayaran');

            var harga = parseFloat(hargaInput.value);
            var jumlah = parseInt(jumlahInput.value);
            var totalPembayaran = harga * jumlah;
            totalPembayaranInput.value = totalPembayaran.toFixed(2);
        });
    </script>
@endsection

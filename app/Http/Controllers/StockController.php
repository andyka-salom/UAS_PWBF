<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockBarang;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index()
{
    if (Auth::check()) {
        $userId = Auth::user()->id;
        $stocks = StockBarang::where('id_user', $userId)->get();

        return view('updatestock', compact('stocks'));
    }
}

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'berat' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'foto_barang' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $stock = new StockBarang();
        $stock->nama_barang = $request->input('nama_barang');
        $stock->jumlah_barang = $request->input('jumlah_barang');
        $stock->berat = $request->input('berat');
        $stock->satuan = $request->input('satuan');
        $stock->harga = $request->input('harga');
        $stock->id_penangkaran = Auth::id(); 
        $stock->id_user =Auth::id();

        $stock->save();
    
        if ($request->hasFile('foto_barang')) {
            $fotoBarang = $request->file('foto_barang');
         
        }
    
        return redirect()->route('stock.index')->with('success', 'Stock berhasil ditambahkan.');
    }
    

    public function edit($id)
    {
        $stock = StockBarang::findOrFail($id);
        return view('editstock', compact('stock'));
    }

    public function update(Request $request, $id)
    {
        $stock = StockBarang::findOrFail($id);
        $stock->nama_barang = $request->nama_barang;
        $stock->jumlah_barang = $request->jumlah_barang;
        $stock->berat = $request->berat;
        $stock->satuan = $request->satuan;
        $stock->harga = $request->harga;
        $stock->id_penangkaran = Auth::id();

        if ($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/foto_barang', $fileName);
            $stock->foto_barang = 'storage/foto_barang/' . $fileName;
        }

        $stock->save();

        return redirect()->back()->with('success', 'Stock barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $stock = StockBarang::findOrFail($id);
        $stock->delete();

        return redirect()->back()->with('success', 'Stock barang berhasil dihapus');
    }
}

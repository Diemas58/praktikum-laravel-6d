<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function index()
    {
        $data_barang = Barang::with(['kategori', 'supplier'])->latest()->get();
        $total_stok = Barang::sum('stok');
        $total_barang = Barang::count();
        $total_kategori = Kategori::count();
        $total_supplier = Supplier::count();
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        $filterKategori = null;

        return view('barang.index', compact(
            'data_barang',
            'total_stok',
            'total_barang',
            'total_kategori',
            'total_supplier',
            'kategoris',
            'filterKategori'
        ));
    }

    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        $suppliers = Supplier::orderBy('nama_supplier')->get();

        return view('barang.create', compact('kategoris', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => ['required', 'min:3', 'max:100', 'unique:barangs,nama_barang'],
            'harga' => ['required', 'numeric', 'min:1000'],
            'stok' => ['required', 'integer', 'min:0'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'supplier_id' => ['nullable', 'exists:suppliers,id'],
        ]);

        Barang::create($validated);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function show(Barang $barang)
    {
        $barang->load(['kategori', 'supplier']);

        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        $suppliers = Supplier::orderBy('nama_supplier')->get();

        return view('barang.edit', compact('barang', 'kategoris', 'suppliers'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_barang' => [
                'required',
                'min:3',
                'max:100',
                Rule::unique('barangs', 'nama_barang')->ignore($barang->id),
            ],
            'harga' => ['required', 'numeric', 'min:1000'],
            'stok' => ['required', 'integer', 'min:0'],
            'kategori_id' => ['required', 'exists:kategoris,id'],
            'supplier_id' => ['nullable', 'exists:suppliers,id'],
        ]);

        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus!');
    }

    public function detail(string $nama)
    {
        $barangs = Barang::with(['kategori', 'supplier'])
            ->where('nama_barang', 'like', '%' . $nama . '%')
            ->latest()
            ->get();

        return view('barang.detail', compact('barangs', 'nama'));
    }

    public function kategori(Kategori $kategori)
    {
        $data_barang = $kategori->barangs()->with(['kategori', 'supplier'])->latest()->get();
        $total_stok = $data_barang->sum('stok');
        $total_barang = $data_barang->count();
        $total_kategori = Kategori::count();
        $total_supplier = Supplier::count();
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        $filterKategori = $kategori;

        return view('barang.index', compact(
            'data_barang',
            'total_stok',
            'total_barang',
            'total_kategori',
            'total_supplier',
            'kategoris',
            'filterKategori'
        ));
    }
}

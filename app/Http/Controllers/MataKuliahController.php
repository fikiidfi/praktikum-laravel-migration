<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    // Menampilkan seluruh data mata kuliah
    public function index()
    {
        $matakuliah = MataKuliah::all();

        return view('matakuliah.index', compact('matakuliah'));
    }

    // Menampilkan form tambah mata kuliah
    public function create()
    {
        return view('matakuliah.create');
    }

    // Menyimpan data mata kuliah
    public function store(Request $request)
    {
        $request->validate([
            'kode_matakuliah' => 'required|string|max:20|unique:matakuliah,kode_matakuliah',
            'nama_matakuliah' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
        ], [
            'kode_matakuliah.required' => 'Kode mata kuliah wajib diisi.',
            'kode_matakuliah.unique' => 'Kode mata kuliah sudah digunakan.',
            'nama_matakuliah.required' => 'Nama mata kuliah wajib diisi.',
            'sks.required' => 'Jumlah SKS wajib diisi.',
            'sks.integer' => 'Jumlah SKS harus berupa angka.',
            'sks.min' => 'Jumlah SKS minimal 1.',
            'sks.max' => 'Jumlah SKS maksimal 6.',
        ]);

        MataKuliah::create([
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks,
        ]);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    // Menampilkan detail mata kuliah
    public function show(int $id)
    {
        $matakuliah = MataKuliah::findOrFail($id);

        return view('matakuliah.show', compact('matakuliah'));
    }
}



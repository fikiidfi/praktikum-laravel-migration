<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    // Menampilkan seluruh data jurusan
    public function index()
    {
        $jurusans = Jurusan::all();

        return view('jurusan.index', compact('jurusans'));
    }

    // Menampilkan form tambah jurusan
    public function create()
    {
        return view('jurusan.create');
    }

    // Menyimpan data jurusan ke database
    public function store(Request $request)
    {
        // Melakukan validasi input
        $request->validate([
            'kode' => 'required|string|max:5|unique:jurusans,kode',
            'nama' => 'required|string|max:100',
        ]);

        // Menyimpan data yang sudah divalidasi
        Jurusan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        // Kembali ke halaman daftar jurusan
        return redirect()->route('jurusan.index')
            ->with('success', 'Data jurusan berhasil ditambahkan.');
    }

    // Menampilkan detail jurusan
    public function show(int $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        return view('jurusan.show', compact('jurusan'));
    }
}
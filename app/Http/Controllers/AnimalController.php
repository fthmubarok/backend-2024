<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // Buat property animals
    private $animals = ['kucing', 'ayam', 'ikan'];

    // GET Request: Tampilkan data animals
    public function index()
    {
        return response()->json($this->animals);
    }

    // POST Request: Tambahkan hewan baru
    public function store(Request $request)
    {
        $newAnimal = $request->input('animal');
        array_push($this->animals, $newAnimal);

        return response()->json([
            'message' => 'Hewan berhasil ditambahkan!',
            'animals' => $this->animals
        ]);
    }

    // PUT Request: Update data hewan berdasarkan ID
    public function update(Request $request, $id)
    {
        $updatedAnimal = $request->input('animal');
        if (isset($this->animals[$id])) {
            $this->animals[$id] = $updatedAnimal;

            return response()->json([
                'message' => 'Hewan berhasil diupdate!',
                'animals' => $this->animals
            ]);
        }

        return response()->json(['message' => 'Hewan tidak ditemukan!'], 404);
    }

    // DELETE Request: Hapus data hewan berdasarkan ID
    public function destroy($id)
    {
        if (isset($this->animals[$id])) {
            array_splice($this->animals, $id, 1);

            return response()->json([
                'message' => 'Hewan berhasil dihapus!',
                'animals' => $this->animals
            ]);
        }

        return response()->json(['message' => 'Hewan tidak ditemukan!'], 404);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservasi; 
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil seluruh data reservasi dari database
        $reservasi = Reservasi::all();

        // Mengembalikan data dalam format JSON standar API
        return response()->json([
            'success' => true,
            'message' => 'List Data Reservasi',
            'data'    => $reservasi
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi sesuai kolom asli pada Model & Database (status diubah ke integer)
        $validator = \Validator::make($request->all(), [
            'user_id'       => 'required|integer',
            'meja_id'       => 'required|integer',
            'tanggal'       => 'required|date',
            'jam'           => 'required',
            'jumlah_tamu'   => 'required|integer',
            'catatan'       => 'nullable|string',
            'status'        => 'nullable|integer',
            'biaya_deposit' => 'nullable|numeric',
        ]);

        // Jika validasi gagal, kembalikan response error 422
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data'    => $validator->errors()
            ], 422);
        }

        // 2. Simpan data ke database
        $reservasi = Reservasi::create($request->all());

        // 3. Kembalikan response JSON sukses (status 201 Created)
        return response()->json([
            'success' => true,
            'message' => 'Data Reservasi Berhasil Disimpan',
            'data'    => $reservasi
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Nanti kita isi untuk detail reservasi
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Nanti kita isi untuk update data
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Nanti kita isi untuk hapus data
    }
}
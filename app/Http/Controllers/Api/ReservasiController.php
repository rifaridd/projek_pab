<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservasiController extends Controller
{
    /**
     * Menampilkan semua data reservasi
     */
    public function index()
    {
        $reservasis = Reservasi::all();
        return new PostResource(true, 'List Data Reservasi', $reservasis);
    }

    /**
     * Menyimpan data reservasi baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'       => 'required|integer',
            'meja_id'       => 'required|integer',
            'tanggal'       => 'required|date',
            'jam'           => 'required',
            'jumlah_tamu'   => 'required|integer',
            'catatan'       => 'nullable|string',
            'status'        => 'nullable|integer',
            'biaya_deposit' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data'    => $validator->errors()
            ], 422);
        }

        $reservasi = Reservasi::create($request->all());

        return new PostResource(true, 'Data Reservasi Berhasil Disimpan', $reservasi);
    }

    /**
     * Menampilkan detail reservasi berdasarkan ID
     */
    public function show($id)
    {
        $reservasi = Reservasi::find($id);

        if (!$reservasi) {
            return response()->json([
                'success' => false,
                'message' => 'Data Reservasi Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        return new PostResource(true, 'Detail Data Reservasi', $reservasi);
    }

    /**
     * Mengubah data reservasi
     */
    public function update(Request $request, $id)
    {
        $reservasi = Reservasi::find($id);

        if (!$reservasi) {
            return response()->json([
                'success' => false,
                'message' => 'Data Reservasi Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $reservasi->update($request->all());

        return new PostResource(true, 'Data Reservasi Berhasil Diubah', $reservasi);
    }

    /**
     * Menghapus data reservasi
     */
    public function destroy($id)
    {
        $reservasi = Reservasi::find($id);

        if (!$reservasi) {
            return response()->json([
                'success' => false,
                'message' => 'Data Reservasi Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $reservasi->delete();

        return new PostResource(true, 'Data Reservasi Berhasil Dihapus', null);
    }
}
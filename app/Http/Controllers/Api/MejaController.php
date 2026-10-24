<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meja;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MejaController extends Controller
{
    /**
     * Menampilkan semua data meja
     */
    public function index()
    {
        $mejas = Meja::all();
        return new PostResource(true, 'List Data Meja', $mejas);
    }

    /**
     * Menyimpan data meja baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_meja' => 'required|string',
            'kapasitas'  => 'required|integer',
            'status'     => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data'    => $validator->errors()
            ], 422);
        }

        $meja = Meja::create($request->all());

        return new PostResource(true, 'Data Meja Berhasil Disimpan', $meja);
    }

    /**
     * Menampilkan detail meja berdasarkan ID
     */
    public function show(int $id)
    {
        $meja = Meja::find($id);

        if (!$meja) {
            return response()->json([
                'success' => false,
                'message' => 'Data Meja Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        return new PostResource(true, 'Detail Data Meja', $meja);
    }

    /**
     * Mengubah data meja
     */
    public function update(Request $request, int $id)
    {
        $meja = Meja::find($id);

        if (!$meja) {
            return response()->json([
                'success' => false,
                'message' => 'Data Meja Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nomor_meja' => 'required|string',
            'kapasitas'  => 'required|integer',
            'status'     => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data'    => $validator->errors()
            ], 422);
        }

        $meja->update($request->all());

        return new PostResource(true, 'Data Meja Berhasil Diubah', $meja);
    }

    /**
     * Menghapus data meja
     */
    public function destroy(int $id)
    {
        $meja = Meja::find($id);

        if (!$meja) {
            return response()->json([
                'success' => false,
                'message' => 'Data Meja Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $meja->delete();

        return new PostResource(true, 'Data Meja Berhasil Dihapus', null);
    }
}
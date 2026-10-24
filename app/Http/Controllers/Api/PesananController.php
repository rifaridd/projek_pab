<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    /**
     * Menampilkan semua data pesanan
     */
    public function index()
    {
        $pesanans = Pesanan::all();
        return new PostResource(true, 'List Data Pesanan', $pesanans);
    }

    /**
     * Menyimpan data pesanan baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'     => 'required|integer',
            'total_harga' => 'required|numeric',
            'status'      => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data'    => $validator->errors()
            ], 422);
        }

        $pesanan = Pesanan::create($request->all());

        return new PostResource(true, 'Data Pesanan Berhasil Disimpan', $pesanan);
    }

    /**
     * Menampilkan detail pesanan berdasarkan ID
     */
    public function show(int $id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pesanan Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        return new PostResource(true, 'Detail Data Pesanan', $pesanan);
    }

    /**
     * Mengubah data pesanan
     */
    public function update(Request $request, int $id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pesanan Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id'     => 'required|integer',
            'total_harga' => 'required|numeric',
            'status'      => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data'    => $validator->errors()
            ], 422);
        }

        $pesanan->update($request->all());

        return new PostResource(true, 'Data Pesanan Berhasil Diubah', $pesanan);
    }

    /**
     * Menghapus data pesanan
     */
    public function destroy(int $id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pesanan Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $pesanan->delete();

        return new PostResource(true, 'Data Pesanan Berhasil Dihapus', null);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    public function index()
    {
        // Mengambil data pesanan beserta relasi itemnya (jika relasi sudah dibuat di model)
        $pesanans = Pesanan::all();
        return new PostResource(true, 'List Data Pesanan', $pesanans);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'       => 'required|integer',
            'meja_id'       => 'required|integer',
            'total_harga'   => 'required|numeric',
            'status_pesanan'=> 'required|string',
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

    public function show($id)
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

    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::find($id);

        if (!$pesanan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pesanan Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $pesanan->update($request->all());

        return new PostResource(true, 'Data Pesanan Berhasil Diubah', $pesanan);
    }

    public function destroy($id)
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
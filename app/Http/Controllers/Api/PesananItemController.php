<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PesananItem;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesananItemController extends Controller
{
    /**
     * Menampilkan semua data pesanan item
     */
    public function index()
    {
        $pesananItems = PesananItem::all();
        return new PostResource(true, 'List Data Pesanan Item', $pesananItems);
    }

    /**
     * Menyimpan data pesanan item baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pesanan_id' => 'required|integer',
            'menu_id'    => 'required|integer',
            'jumlah'     => 'required|integer',
            'subtotal'   => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data'    => $validator->errors()
            ], 422);
        }

        $pesananItem = PesananItem::create($request->all());

        return new PostResource(true, 'Data Pesanan Item Berhasil Disimpan', $pesananItem);
    }

    /**
     * Menampilkan detail pesanan item berdasarkan ID
     */
    public function show(int $id)
    {
        $pesananItem = PesananItem::find($id);

        if (!$pesananItem) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pesanan Item Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        return new PostResource(true, 'Detail Data Pesanan Item', $pesananItem);
    }

    /**
     * Mengubah data pesanan item
     */
    public function update(Request $request, int $id)
    {
        $pesananItem = PesananItem::find($id);

        if (!$pesananItem) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pesanan Item Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'pesanan_id' => 'required|integer',
            'menu_id'    => 'required|integer',
            'jumlah'     => 'required|integer',
            'subtotal'   => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data'    => $validator->errors()
            ], 422);
        }

        $pesananItem->update($request->all());

        return new PostResource(true, 'Data Pesanan Item Berhasil Diubah', $pesananItem);
    }

    /**
     * Menghapus data pesanan item
     */
    public function destroy(int $id)
    {
        $pesananItem = PesananItem::find($id);

        if (!$pesananItem) {
            return response()->json([
                'success' => false,
                'message' => 'Data Pesanan Item Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $pesananItem->delete();

        return new PostResource(true, 'Data Pesanan Item Berhasil Dihapus', null);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PesananItem;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesananItemController extends Controller
{
    public function index()
    {
        $items = PesananItem::all();
        return new PostResource(true, 'List Data Item Pesanan', $items);
    }

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

        $item = PesananItem::create($request->all());

        return new PostResource(true, 'Item Pesanan Berhasil Disimpan', $item);
    }

    public function show($id)
    {
        $item = PesananItem::find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Item Pesanan Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        return new PostResource(true, 'Detail Item Pesanan', $item);
    }

    public function update(Request $request, $id)
    {
        $item = PesananItem::find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Item Pesanan Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $item->update($request->all());

        return new PostResource(true, 'Item Pesanan Berhasil Diubah', $item);
    }

    public function destroy($id)
    {
        $item = PesananItem::find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Item Pesanan Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $item->delete();

        return new PostResource(true, 'Item Pesanan Berhasil Dihapus', null);
    }
}
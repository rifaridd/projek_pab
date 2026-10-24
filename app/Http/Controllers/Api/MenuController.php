<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return new PostResource(true, 'List Data Menu', $menus);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_menu'   => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'harga'       => 'required|numeric',
            'kategori'    => 'required|string',
            'stok'        => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data'    => $validator->errors()
            ], 422);
        }

        $menu = Menu::create($request->all());

        return new PostResource(true, 'Data Menu Berhasil Disimpan', $menu);
    }

    public function show($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Data Menu Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        return new PostResource(true, 'Detail Data Menu', $menu);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Data Menu Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $menu->update($request->all());

        return new PostResource(true, 'Data Menu Berhasil Diubah', $menu);
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Data Menu Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $menu->delete();

        return new PostResource(true, 'Data Menu Berhasil Dihapus', null);
    }
}
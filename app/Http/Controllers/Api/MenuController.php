<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Menampilkan semua data menu
     */
    public function index()
    {
        $menus = Menu::all();
        return new PostResource(true, 'List Data Menu', $menus);
    }

    /**
     * Menyimpan data menu baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_menu' => 'required|string',
            'harga'     => 'required|numeric',
            'kategori'  => 'required|string',
            'deskripsi' => 'required|string',
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

    /**
     * Menampilkan detail menu berdasarkan ID
     */
    public function show(int $id)
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

    /**
     * Mengubah data menu
     */
    public function update(Request $request, int $id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Data Menu Tidak Ditemukan',
                'data'    => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_menu' => 'required|string',
            'harga'     => 'required|numeric',
            'kategori'  => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data'    => $validator->errors()
            ], 422);
        }

        $menu->update($request->all());

        return new PostResource(true, 'Data Menu Berhasil Diubah', $menu);
    }

    /**
     * Menghapus data menu
     */
    public function destroy(int $id)
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

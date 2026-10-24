<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meja; // Pastikan nama Model sesuai (misal: Meja)
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        $mejas = Meja::all();

        return response()->json([
            'success' => true,
            'message' => 'List Data Meja',
            'data'    => $mejas
        ], 200);
    }
}
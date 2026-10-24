<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'nama_menu' => 'Wagyu Tenderloin',
                'harga' => 460000.00,
                'deskripsi' => 'Daging Wagyu premium grade A5 dipanggang dengan tingkat kematangan sempurna, disajikan dengan saus jus daging truffle spesial, kentang tumbuk lembut, dan asparagus segar.',
                'kategori' => 'makanan_utama',
                'stok' => 15,
                'is_populer' => true,
                'image_url' => null,
            ],
            [
                'nama_menu' => 'Truffle Pasta',
                'harga' => 185000.00,
                'deskripsi' => 'Pasta tagliatelle buatan tangan diselimuti krim truffle yang wangi, jamur liar tumis, keju parmesan berumur 24 bulan, dan minyak truffle putih.',
                'kategori' => 'makanan_utama',
                'stok' => 25,
                'is_populer' => true,
                'image_url' => null,
            ],
            [
                'nama_menu' => 'Chocolate Entremet',
                'harga' => 120000.00,
                'deskripsi' => 'Karya seni pencuci mulut dengan lapisan mousse cokelat hitam Belgia 70%, ganache cokelat susu, hazelnut praline renyah, dan lapisan glaze cermin berkilau.',
                'kategori' => 'dessert',
                'stok' => 10,
                'is_populer' => true,
                'image_url' => null,
            ],
            [
                'nama_menu' => 'Lumière Signature',
                'harga' => 150000.00,
                'deskripsi' => 'Mocktail mewah khas Lumière yang memadukan sari buah markisa segar, sirup rosemary buatan sendiri, air soda lemon, dibubuhi serpihan emas 24 karat yang dapat dimakan.',
                'kategori' => 'minuman',
                'stok' => 40,
                'is_populer' => false,
                'image_url' => null,
            ],
            [
                'nama_menu' => 'Seared Scallops',
                'harga' => 125000.00,
                'deskripsi' => 'Hokkaido scallops segar yang dipanggang cepat dengan mentega herba, disajikan di atas puree kembang kol lembut, saus mentega lemon, dan mikro-green.',
                'kategori' => 'appetizer',
                'stok' => 20,
                'is_populer' => false,
                'image_url' => null,
            ],
            [
                'nama_menu' => 'Garden Salad',
                'harga' => 75000.00,
                'deskripsi' => 'Campuran sayuran hijau organik segar, tomat ceri manis, buah bit panggang, kacang kenari karamel, dan keju kambing lembut dengan saus dressing lemon vinaigrette.',
                'kategori' => 'appetizer',
                'stok' => 30,
                'is_populer' => false,
                'image_url' => null,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
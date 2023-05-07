<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SAWController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Nilai bobot dari masing-masing kriteria
        $bobot = [0.3, 0.2, 0.2, 0.3];

        // Nilai alternatif produk
        $produk = [
            ['A1', 8, 10, 7, 9],
            ['A2', 9, 8, 8, 7],
            ['A3', 7, 9, 9, 8],
        ];

        // Fungsi untuk menghitung SAW
        function hitung_saw($bobot, $produk) {
            $jumlah_kriteria = count($bobot);
            $jumlah_produk = count($produk);

            // Inisialisasi nilai total SAW untuk setiap produk
            $nilai_total = [];
            for ($i = 0; $i < $jumlah_produk; $i++) {
                $nilai_total[$i] = 0;
            }

            // Hitung nilai SAW untuk setiap alternatif produk
            for ($i = 0; $i < $jumlah_kriteria; $i++) {
                for ($j = 0; $j < $jumlah_produk; $j++) {
                    $nilai_total[$j] += $bobot[$i] * $produk[$j][$i + 1];
                }
            }

            // Urutkan produk berdasarkan nilai SAW
            array_multisort($nilai_total, SORT_DESC, $produk);

            return $produk;
        }

        // Hitung nilai SAW dan tampilkan hasilnya
        $nilai_saw = hitung_saw($bobot, $produk);
        return $nilai_saw;

        // return view('saw.index');
    }


    public function determinePromoProduct()
    {
        // Ambil data alternatif produk dari tabel produk
        $products = Produk::all();

        // Tentukan bobot atribut
        $attributeWeights = [
            'harga' => 0.3,
            'penjualan' => 0.2,
            'daya_tahan' => 0.2,
            'persediaan' => 0.3,
        ];

        // Tentukan skor SAW untuk setiap alternatif produk
        $scores = [];
        foreach ($products as $product) {
            $score = 0;
            $score += $product->harga_jual * $attributeWeights['harga'];

            // Ambil data atribut penjualan dari tabel penjualan
            $sales = Penjualan::where('id_produk', $products->id_produk)->get();
            $penjualan = 0;
            foreach ($sales as $sale) {
                $penjualan += $sale->jumlah;
            }

            $score += $penjualan * $attributeWeights['penjualan'];
            $score += $product->daya_tahan * $attributeWeights['daya_tahan'];
            $score += $product->persediaan * $attributeWeights['persediaan'];

            $scores[$product->id] = $score;
        }

        // Tentukan alternatif produk dengan skor tertinggi sebagai alternatif terbaik
        $promoProductId = array_search(max($scores), $scores);
        $promoProduct = Produk::find($promoProductId);

        return $promoProduct;
    }
}

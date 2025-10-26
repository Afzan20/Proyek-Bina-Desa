<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\KategoriAset;
use App\Models\PemeliharaanAset;
use App\Models\MutasiAset;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  $kategoriAset = [
        //     [
        //         'kategori_id' => 1,
        //         'nama' => 'Elektronik',
        //         'kode' => 'ELK',
        //         'deskripsi' => 'Perangkat elektronik dan teknologi'
        //     ],
        //     [
        //         'kategori_id' => 2,
        //         'nama' => 'Furniture',
        //         'kode' => 'FUR',
        //         'deskripsi' => 'Perabotan kantor'
        //     ],
        //     [
        //         'kategori_id' => 3,
        //         'nama' => 'Kendaraan',
        //         'kode' => 'KND',
        //         'deskripsi' => 'Kendaraan operasional'
        //     ]
        // ];

        // $aset = [
        //     [
        //         'aset_id' => 1,
        //         'kategori_id' => 1,
        //         'kategori_nama' => 'Elektronik',
        //         'kode_aset' => 'ELK001',
        //         'nama_aset' => 'Laptop Dell Inspiron 15',
        //         'tgl_perolehan' => '2024-01-15',
        //         'nilai_perolehan' => 8500000.00,
        //         'kondisi' => 'baik'
        //     ],
        //     [
        //         'aset_id' => 2,
        //         'kategori_id' => 2,
        //         'kategori_nama' => 'Furniture',
        //         'kode_aset' => 'FUR001',
        //         'nama_aset' => 'Meja Kantor Executive',
        //         'tgl_perolehan' => '2024-02-10',
        //         'nilai_perolehan' => 1200000.00,
        //         'kondisi' => 'baik'
        //     ],
        //     [
        //         'aset_id' => 3,
        //         'kategori_id' => 1,
        //         'kategori_nama' => 'Elektronik',
        //         'kode_aset' => 'ELK002',
        //         'nama_aset' => 'Printer Canon Pixma',
        //         'tgl_perolehan' => '2023-12-05',
        //         'nilai_perolehan' => 2500000.00,
        //         'kondisi' => 'rusak ringan'
        //     ],
        //     [
        //         'aset_id' => 4,
        //         'kategori_id' => 2,
        //         'kategori_nama' => 'Furniture',
        //         'kode_aset' => 'FUR002',
        //         'nama_aset' => 'Kursi Kantor Ergonomis',
        //         'tgl_perolehan' => '2024-03-01',
        //         'nilai_perolehan' => 750000.00,
        //         'kondisi' => 'baik'
        //     ],
        //     [
        //         'aset_id' => 5,
        //         'kategori_id' => 3,
        //         'kategori_nama' => 'Kendaraan',
        //         'kode_aset' => 'KND001',
        //         'nama_aset' => 'Toyota Avanza',
        //         'tgl_perolehan' => '2023-06-15',
        //         'nilai_perolehan' => 180000000.00,
        //         'kondisi' => 'baik'
        //     ]
        // ];

        // $lokasiAset = [
        //     [
        //         'lokasi_id' => 1,
        //         'aset_id' => 1,
        //         'keterangan' => 'Ruang Sekretaris',
        //         'lokasi_text' => 'Kantor Desa',
        //         'rt' => '001',
        //         'rw' => '001'
        //     ],
        //     [
        //         'lokasi_id' => 2,
        //         'aset_id' => 2,
        //         'keterangan' => 'Ruang Kades',
        //         'lokasi_text' => 'Kantor Desa',
        //         'rt' => '002',
        //         'rw' => '001'
        //     ],
        //     [
        //         'lokasi_id' => 3,
        //         'aset_id' => 3,
        //         'keterangan' => 'Ruang Sekretaris',
        //         'lokasi_text' => 'Kantor Desa',
        //         'rt' => '001',
        //         'rw' => '002'
        //     ]
        // ];

        // $pemeliharaanAset = [
        //     [
        //         'pemeliharaan_id' => 1,
        //         'aset_id' => 1,
        //         'tanggal' => '2024-06-15',
        //         'tindakan' => 'Pembersihan dan update software',
        //         'biaya' => 150000.00,
        //         'pelaksana' => 'Tim IT'
        //     ],
        //     [
        //         'pemeliharaan_id' => 2,
        //         'aset_id' => 5,
        //         'tanggal' => '2024-05-20',
        //         'tindakan' => 'Service rutin dan ganti oli',
        //         'biaya' => 500000.00,
        //         'pelaksana' => 'Bengkel Resmi'
        //     ]
        // ];

        // Data mutasi_aset
        // $mutasiAset = [
        //     [
        //         'mutasi_id' => 1,
        //         'aset_id' => 2,
        //         'tanggal' => '2024-03-15',
        //         'jenis_mutasi' => 'pindah',
        //         'keterangan' => 'Dipindah ke ruang direktur'
        //     ],
        //     [
        //         'mutasi_id' => 2,
        //         'aset_id' => 3,
        //         'tanggal' => '2024-04-10',
        //         'jenis_mutasi' => 'perbaikan',
        //         'keterangan' => 'Perbaikan head printer'
        //     ]
        // ];

         // Ambil data dari database
        $totalAset = Aset::sum('nilai_perolehan'); // total nilai aset
        $totalJumlahAset = Aset::count();          // jumlah baris aset
        $totalKategori = KategoriAset::count();    // jumlah kategori
        $totalPemeliharaan = PemeliharaanAset::count(); // jumlah pemeliharaan
        $totalMutasiAset = MutasiAset::count(); // jumlaj mutasi

        // Kirim ke view
        return view('admin.dashboard', [
            'totalAset' => $totalAset,
            'totalJumlahAset' => $totalJumlahAset,
            'totalKategori' => $totalKategori,
            'totalPemeliharaan' => $totalPemeliharaan,
            'totalMutasiAset' => $totalMutasiAset,
        ]);
    }
}

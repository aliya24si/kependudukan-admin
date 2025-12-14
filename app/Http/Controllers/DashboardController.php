<?php
namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\PenerimaBantuan;
use App\Models\Program;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik
        $total_programs     = Program::count();
        $total_anggaran     = Program::sum('anggaran');
        $programs_tahun_ini = Program::whereYear('created_at', date('Y'))->count();
        $total_penerima     = PenerimaBantuan::count();

        // Tambahkan ini
        $total_pendaftar = Pendaftar::count();

        // Program terbaru (limit 5)
        $recent_programs = Program::latest()->take(5)->get();

        // Data pengembang
        $pengembang = [
            [
                'nama'      => 'Aliya Safwa Shafira',
                'nim'       => '2457301009',
                'prodi'     => 'Sistem Informatika',
                'lokasi'    => 'Pekanbaru, Indonesia', // Tambah ini
                'foto'      => 'assets-admin/images/layout_img/aliya-safwa.JPG',

                'linkedin'  => 'https://www.linkedin.com/in/aliya-safwa-733524360',
                'github'    => 'https://github.com/aliya24si',
                'instagram' => 'https://www.instagram.com/my.skylandd?igsh=NzVveXAzMDlxcnM5',
                'youtube'   => 'https://youtube.com/@my.skylandd1651?si=apUOi2jMOONY8A4Y',

                'wa'        => '+62 823-9190-6810',
                'email'     => 'safwa24si@mahasiswa.pcr.ac.id',
            ],
            [
                'nama'      => 'Muhammad Johan Ardiansyah Putra',
                'nim'       => '2457301094',
                'prodi'     => 'Sistem Informasi',
                'lokasi'    => 'Pekanbaru, Indonesia', // Tambah ini
                'foto'      => 'assets-admin/images/layout_img/johan.jpg',

                'linkedin'  => 'https://linkedin.com/in/pengembang2',
                'github'    => 'https://github.com/pengembang2',
                'instagram' => 'https://www.instagram.com/johana.putra',
                'youtube'   => 'https://youtube.com/@muhammadjohanarninasyahputra?si=xSkLbL9tn-wAg_Sk',

                'wa'        => '+62 819-1898-0969',
                'email'     => 'johan24si@mahasiswa.pcr.ac.id',
            ],
        ];

        return view('pages.dashboard', compact(
            'total_programs',
            'total_anggaran',
            'programs_tahun_ini',
            'total_penerima',
            'recent_programs',
            'pengembang',
            'total_pendaftar' // <---- WAJIB TAMBAH DI SINI
        ));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        return view('pages.admin.dashboard',[
            'pengaduan' => Pengaduan::count(),
            'user' => User::where('roles','=', 'USER')->count(),
            'petugas' => User::where('roles', '=', 'PETUGAS')->count(),
            'admin' => User::where('roles', '=', 'ADMIN')->count(),
            'tanggapan' => Tanggapan::count(),
            'pending' => Pengaduan::where('status', 'Belum di Proses')->count(),
            'process' => Pengaduan::where('status', 'Sedang di Proses')->count(),
            'success' => Pengaduan::where('status', 'Selesai')->count(),
             'jumlahPengguna' => User::count(), // Menambahkan jumlah total pengguna
        'jumlahPengajuan' => Pengaduan::count(), // Menambahkan jumlah total pengajuan
        'jumlahDilaksanakan' => Pengaduan::where('status', 'Selesai')->count(), // Menambahkan jumlah kegiatan yang selesai
        ]);
    }
}
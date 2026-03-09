<?php

namespace App\Http\Controllers;

use App\Models\Belajar;
use Illuminate\Http\Request;

class BelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('belajar');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function getSiswa()
    {
        $title = "Data Siswa";
        $siswa = [
            [
                'nama' => 'bambang pamungkas',
                'nilai' => 100,
            ],
            [
                'nama' => 'wahyu kamal',
                'nilai' => 80,
            ],
            [
                'nama' => 'Budi Sudasrono',
                'nilai' => 60,
            ]
        ];
        return view('siswa', compact('title', 'siswa'));
    }

    public function create()
    {
        return view('tambah-siswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama = $request->nama;
        $nilai = $request->nilai;
        $status = $nilai >= 75 ? 'Lulus' : 'Tidak Lulus';

        return "Siswa $nama degan nilai $nilai dinyatakan $status";
    }

    /**
     * Display the specified resource.
     */
    public function show(Belajar $belajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Belajar $belajar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Belajar $belajar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Belajar $belajar)
    {
        //
    }
}

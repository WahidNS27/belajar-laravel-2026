<?php

namespace App\Http\Controllers;
use App\Models\pesertaPelatihan;
use Illuminate\Http\Request;

class pesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peserta = pesertaPelatihan::all();
        return view('peserta.index', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        return view('peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required',
            'nomor_hp' => 'required',
            'email' => 'nullable|email'
        ]);

        //simpan database
        pesertaPelatihan::create([
            'jurusan' => $request->jurusan,
            'gelombang' => $request->gelombang,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'kartu_keluarga' => $request->kartu_keluarga,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'nama_sekolah' => $request->nama_sekolah,
            'kejuruan' => $request->kejuruan,
            'nomor_hp' => $request->nomor_hp,
            'email' => $request->email,
            'aktivitas' => $request->aktivitas,
            'status' => $request->status
        ]);

        //return redirect ke index
        return redirect()->route('peserta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peserta = pesertaPelatihan::find($id);
        return view('peserta.edit', compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $peserta = pesertaPelatihan::find($id);


        $peserta->update([
            $peserta->jurusan = $request->jurusan,
            $peserta->gelombang = $request->gelombang,
            $peserta->nama_lengkap = $request->nama_lengkap,
            $peserta->nik = $request->nik,
            $peserta->kartu_keluarga = $request->kartu_keluarga,
            $peserta->jenis_kelamin = $request->jenis_kelamin,
            $peserta->tempat_lahir = $request->tempat_lahir,
            $peserta->pendidikan_terakhir = $request->pendidikan_terakhir,
            $peserta->nama_sekolah = $request->nama_sekolah,
            $peserta->kejuruan = $request->kejuruan,
            $peserta->nomor_hp = $request->nomor_hp,
            $peserta->email = $request->email,
            $peserta->aktivitas = $request->aktivitas,
            $peserta->status = $request->status,
        ]);

        return redirect()->route('peserta.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $peserta = pesertaPelatihan::find($id);
        $peserta->delete();

        return redirect()->route('peserta.index');
    }
}

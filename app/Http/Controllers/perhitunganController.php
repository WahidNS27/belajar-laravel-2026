<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerhitunganController extends Controller
{

    public function index()
    {
        return view('perhitungan.index');
    }

    public function store(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $operator = $request->operator;

        $hasil = 0;

        switch ($operator) {
            case '+':
                $hasil = $angka1 + $angka2;
                break;
            case '-':
                $hasil = $angka1 - $angka2;
                break;
            case '*':
                $hasil = $angka1 * $angka2;
                break;
            case '/':
                if ($angka2 == 0) {
                    return back()->with('error', 'tidak bisa dibagi 0');
                }
                $hasil = $angka1 / $angka2;
                break;
        }

        return view('perhitungan.index', compact('hasil'));
    }

    public function indexVolKubus()
    {
        return view('kubus.vl_kubus');
    }

    public function storeVolKubus(Request $request)
    {
        $s = $request->sisi;
        $vol = $s * $s * $s;

        return view('kubus.vl_kubus', compact('vol'));
    }

    public function lpKubus()
    {
        return view('kubus.lp_kubus');
    }

    public function storelpKubus(Request $request)
    {
        $s = $request->sisi;
        $hasil = 6 * $s * $s;

        return view('kubus.lp_kubus', compact('hasil'));
    }


    public function volTabung()
    {
        return view('tabung.vol_tabung');
    }

    public function storeVolTabung(Request $request)
    {
        $phi = 3.14;
        $r = $request->r;
        $t = $request->t;
        $hasil = $phi * $r * $r * $t;

        return view('tabung.vol_tabung', compact('hasil'));
    }

}

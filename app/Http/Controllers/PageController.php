<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class PageController extends Controller
{
    public function dashboard(){
        $total      = Mahasiswa::count();
        $mean       = number_format(Mahasiswa::avg('score'), 2, ',');
        $min        = Mahasiswa::min('score');
        $max        = Mahasiswa::max('score');

        $data       = [
            'total' => $total, 'mean' => $mean, 'min' => $min, 'max' => $max
        ];

        return view('pages.dashboard', compact('data'));
    }

    public function frequency(){
        $frequency  = Mahasiswa::select('score as score_freq', Mahasiswa::raw('count(*) as frequency'))->groupBy('score')->get();
        
        //dd($frequency);
        return view('mahasiswa.frequency', compact('frequency'));
    }
}
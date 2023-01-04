<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportData;
use App\Imports\ImportData;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Mahasiswa;

class PageController extends Controller
{
    public function dashboard(){
        $total      = Mahasiswa::count();
        $mean       = number_format(Mahasiswa::avg('score'), 1, ',');
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

    public function description(){
        $total  = Mahasiswa::count();
        $mean   = number_format(Mahasiswa::avg('score'), 1, ',');
        $min    = Mahasiswa::min('score');
        $max    = Mahasiswa::max('score');

        $data   = [
            'total' => $total, 'mean' => $mean, 'min' => $min, 'max' => $max
        ];

        return view('mahasiswa.description', compact('data'));
    }

    public function groupdata(){
        $total  = Mahasiswa::count('score');
        $min    = Mahasiswa::min('score');
        $max    = Mahasiswa::max('score');
        $range  = $max - $min;

        //round numbers up to the nearest integer
        $class      = ceil((3.3 * log10($total)) + 1);
        $interval   = ceil($range / $class);

        $lowerlimit = $min;
        $upperlimit = 0;

        for ($i = 0; $i < $class; $i++) {
            $upperlimit     = $lowerlimit + $interval;
            $frequency[$i]  = Mahasiswa::select(Mahasiswa::raw('count(*) as frequency, score'))
                ->where([['score', '>=', $lowerlimit], ['score', '<=', $upperlimit]])
                ->count();

            $rangedata[$i]  = $lowerlimit . '-' . $upperlimit;
            $lowerlimit     = $upperlimit + 1;
        }

        // $data       = [
        //     'class' => $class, 'frequency' => $frequency, 'rangedata' => $rangedata, 
        // ];

        //return view('mahasiswa.groupdata', compact('data'));
        return view('mahasiswa.groupdata', [
            'class' => $class, 'frequency' => $frequency, 'rangedata' => $rangedata, 
        ]);
    }

    // Import dan Export Data
    public function import(Request $request)
    {
        $data       = $request->file('file');
        
        Alert::success('Data Successfully Imported');

        //dd($data);
        Excel::import(new ImportData, $data);
        return redirect()->back();
    }

    public function export(Request $request)
    {
        return Excel::download(new ExportData, 'data_mahasiswa.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
}
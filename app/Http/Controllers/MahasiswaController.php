<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa   = Mahasiswa::all();

        //dd($mahasiswa);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa   = Mahasiswa::all();

        return view('mahasiswa.create', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'score' => 'required',
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->score = $request->input('score');
        $mahasiswa->save();

        //return to_route('mahasiswa.index')->with('success','Data Succsessfully Added');
        return redirect('/data-tunggal')->with('toast_success', 'Data Sucessfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa   = Mahasiswa::find($id);

        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'score' => 'required',
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->score = $request->input('score');
        $mahasiswa->save();

        //return to_route('mahasiswa.index')->with('success','Data Succsessfully Updated');
        return redirect('/data-tunggal')->with('toast_success', 'Data Sucessfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();

        return back()->with('success','Data Succsessfully Deleted');
    }
}

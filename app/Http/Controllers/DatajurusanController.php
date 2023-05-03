<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class DatajurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datajurusan = Jurusan::all();
        return view('master.datajurusan.index_jurusan', compact('datajurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.datajurusan.tambah_jurusan');
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
            'nama_jurusan' => 'required|min:6|unique:jurusans',
            'kode_jurusan' => 'required|min:2|unique:jurusans',
        ]);

        Jurusan::create($request->all());

        return redirect()->route('datajurusan.index')
            ->with('success', 'Data Jurusan created successfully.');
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
        $datajurusan = Jurusan::find($id);
        // dd($datasiswa);
        return view('master.datajurusan.edit_jurusan', compact('datajurusan'));
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
            'kode_jurusan' => 'required|min:2|unique:jurusans,kode_jurusan,' . $id,
            'nama_jurusan' => 'required|min:6|unique:jurusans,nama_jurusan,' . $id,
        ]);

        Jurusan::find($id)->update($request->all());

        return redirect()->route('datajurusan.index')
            ->with('success', 'Data Jurusan Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jurusan::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Data Jurusan Deleted successfully.');
    }
}
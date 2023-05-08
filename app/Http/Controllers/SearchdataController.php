<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SearchdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $request->validate([
                'jurusan' => 'required',
                'NISN'  => 'required',
                'no_ijazah' => 'required'
            ]);
            // dd('halo');
            $searchsiswa = Siswa::where('jurusan',  'like', "%" . $request->jurusan . "%")->where('NISN',  'like', "%" . $request->NISN . "%")->where('no_ijazah',  'like', "%" . $request->no_ijazah . "%")->get();
        $jurusan = Jurusan::all();
            //dd($request);
            return view('search_data2', compact('searchsiswa','jurusan'));
        } else {
            // dd('halo');
        $jurusan = Jurusan::all();
            return view('search_data2', compact('jurusan'));
        }
    }
    // public function index(Request $request)
    // {
    //     $jurusan = Jurusan::all();
    //     return view('search_data', compact('searchsiswa', 'jurusan'));
    //     if ($request->search) {
    //         $request->validate([
    //             'jurusan' => 'required',
    //             'NISN'  => 'required',
    //             'no_ijazah' => 'required'
    //         ]);
    //         // dd('halo');
    //         $searchsiswa = Siswa::where('jurusan',  'like', "%" . $request->jurusan . "%")->where('NISN',  'like', "%" . $request->NISN . "%")->where('no_ijazah',  'like', "%" . $request->no_ijazah . "%")->get();
    //         //dd($request);
    //         return view('search_data', compact('searchsiswa', 'jurusan'));
    //     } else {
    //         // dd('halo');
    //         return view('search_data');
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
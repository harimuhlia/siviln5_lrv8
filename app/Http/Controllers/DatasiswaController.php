<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Imports\DatasiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use Illuminate\Contracts\Session\Session;
use Illuminate\Validation\ValidationException;

class DatasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datasiswa = Siswa::all();
        return view('master.datasiswa.index_siswa', compact('datasiswa',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('master.datasiswa.tambah_siswa', compact('jurusan'));
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
            'namalengkap' => 'required',
            'NISN' => 'required|min:6|unique:siswas',
            'jurusan' => 'required',
        ]);

        Siswa::create([
            'namalengkap' => $request->namalengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'NISN' => $request->NISN,
            'jurusan' => $request->jurusan,
            'tempatlahir' => $request->tempatlahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'wali' => $request->wali,
            'thn_masuk' => $request->thn_masuk,
            'thn_lulus' => $request->thn_lulus,
            'no_ijazah' => $request->no_ijazah,
            'asalsekolah' => $request->asalsekolah,
        ]);
    
        return redirect()->route('datasiswa.index')
            ->with('success', 'Student created successfully.');
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
        $jurusan = Jurusan::all();
        $datasiswa = Siswa::find($id);
        // dd($datasiswa);
        return view('master.datasiswa.edit_siswa', compact('datasiswa', 'jurusan'));
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
            'namalengkap' => 'required',
            'NISN' => 'required|min:6|unique:siswas,NISN,' . $id,
            'jurusan' => 'required',
            'no_ijazah' => 'unique:siswas,no_ijazah,' . $id,
        ]);

        Siswa::find($id)->update($request->all());

        return redirect()->route('datasiswa.index')
            ->with('success', 'Student Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Student Deleted successfully.');
    }

    public function importexcel(Request $request) 
	{
        try {
            // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('data_siswa',$nama_file);
 
		// import data
        // Excel::import(new DatasiswaImport, $request->file('file'));
		Excel::import(new SiswaImport, public_path('/data_siswa/'.$nama_file));

        return redirect()->back()
            ->with('success', 'Student Import successfully.');
        } catch (ValidationException $e) {
            //throw $th;
            return back()->withErrors($e->getMessage())->withInput();
        }
	}

    //Jika upload di hosting pakai yg dibawah ini //

    // public function importexcel(Request $request) 
	// {
    //     try {
    //         // validasi
	// 	$this->validate($request, [
	// 		'file' => 'required|mimes:csv,xls,xlsx'
	// 	]);
 
	// 	// import data
    //     Excel::import(new SiswaImport, $request->file('file'));
	// 	Excel::import(new SiswaImport, public_path('/data_siswa/'.$nama_file));

    //     return redirect()->back()
    //         ->with('success', 'Student Import successfully.');
    //     } catch (ValidationException $e) {
    //         //throw $th;
    //         // return back()->withErrors($e->getMessage())->withInput();
    //         $failures = $e->failures();

    // foreach ($failures as $failure) {
    //     $row = $failure->row();
    //     $attribute = $failure->attribute();
    //     $value = $failure->values()[$attribute];
    //     $error = "Row $row: Field NISN with value '$value' failed to import. Errors: NISN has already been taken!";
    //     // simpan pesan error ke dalam sesi
    //     session()->flash('error', $error);
    // }
    
    // // kembalikan pengguna ke halaman sebelumnya dengan pesan error
    // return redirect()->back();
    //     }
	// }

}
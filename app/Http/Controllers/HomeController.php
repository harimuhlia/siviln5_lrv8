<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ChartsiswaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $ChartsiswaModel;
    public function __construct()
    {
        $this->middleware('auth');
        $this->ChartsiswaModel = new ChartsiswaModel();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Data Siswa Pertahun";
        $dataByYear = DB::table('siswas')
            ->select(DB::raw('YEAR(thn_lulus) as year, COUNT(*) as total'))
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->get();
        
        $dataLaki = DB::table('siswas')
        ->join('jurusans', 'jurusans.id', '=', 'siswas.jurusan')
        ->select('jurusans.nama_jurusan', 'siswas.jenis_kelamin', DB::raw('count(*) as total'))
        ->where('siswas.jenis_kelamin', '=', 'Laki-Laki')
        ->groupBy('jurusans.nama_jurusan', 'siswas.jenis_kelamin')
        ->orderBy('jurusans.nama_jurusan', 'asc')
        ->get();

        $jurusans = DB::table('siswas')
        ->join('jurusans', 'siswas.jurusan', '=', 'jurusans.id')
        ->select('jurusans.kode_jurusan as jrsn')
        ->groupBy('jurusans.kode_jurusan')
        ->get();

        $dataPerempuan = DB::table('siswas')
        ->join('jurusans', 'jurusans.id', '=', 'siswas.jurusan')
        ->select('jurusans.nama_jurusan', 'siswas.jenis_kelamin', DB::raw('count(*) as total'))
        ->where('siswas.jenis_kelamin', '=', 'Perempuan')
        ->groupBy('jurusans.nama_jurusan', 'siswas.jenis_kelamin')
        ->orderBy('jurusans.nama_jurusan', 'asc')
        ->get();
  
    $dataByJurusan = DB::table('siswas')
            ->select(DB::raw('jurusans.nama_jurusan as nama_jurusan, COUNT(*) as total'))
            ->join('jurusans', 'siswas.jurusan', '=', 'jurusans.id')
            ->groupBy('jurusans.nama_jurusan')
            ->orderBy('jurusans.nama_jurusan', 'asc')
            ->get();
        $datasiswapertahun = $this->ChartsiswaModel->AllData();
        $pengguna = count(User::all());
        $siswa = count(Siswa::all());
        $jurusan = count(Jurusan::all());
        $ijazah_home = Siswa::all();
        // dd($jurusans);
        return view('home', compact('ijazah_home', 'pengguna', 'siswa', 'jurusan', 'title', 'datasiswapertahun', 'dataByYear', 'dataByJurusan', 'dataLaki', 'dataPerempuan', 'jurusans'));
    }

    public function userProfile(){
        $user = User::findOrFail(Auth::user()->id);
        return view("profil.index_profil", compact("user"));
    }

    public function editUserProfile($id) {
        $user = User::findOrFail($id);
        return view('profil.edit_profil', compact('user'));
    }

    public function updateUserProfile(Request $request, $id) {
        $this->validate($request, [
            "name" => "required|string",
            "email" => "required|email|unique:users,id," . $id,
            // "password" => "required",
        ]);
        $user = User::find($id);
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            // "password" => bcrypt($request->password),
            "jabatan" => $request->jabatan,
            // "role" => $request->role,
            "alamat" => $request->alamat
        ]);
        if($request->hasFile('foto_profil'))
        {
            $destination = 'fotoprofil/'.$user->foto_profil;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('foto_profil');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('fotoprofil/', $filename);
            $user->foto_profil = $filename;

            // Jika user mengganti passwornya password 

            if ($user->password != $request->password) {
                $user->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    // "password" => Hash::make($request->password),
                    "foto_profil" => $filename,
                    // "role" => $request->role,
                    "jabatan" => $request->jabatan,
                    "alamat" => $request->alamat
                ]);
            } else {
                // Jika user tidak mengganti passwordnya

                $user->update([
                    "name" => $request->name,
                    "email" => $request->email,
                    // "password" => $request->password,
                    "foto_profil" => $filename,
                    // "role" => $request->role,
                    "jabatan" => $request->jabatan,
                    "alamat" => $request->alamat
                ]);

            }
        }
        
        return redirect(route("profil", $user->id))->with('success', 'Profil Berhasil Diupdate');
    }
    
}
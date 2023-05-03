<?php

namespace App\Http\Controllers;

use App\Models\ChartsiswaModel;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    private $ChartsiswaModel;
    public function __construct()
    {
        $this->middleware('auth');
        $this->ChartsiswaModel = new ChartsiswaModel();
    }

    public function datasiswapertahun()
    {
        $title = "Data Siswa Pertahun";
        $datasiswapertahun = $this->ChartsiswaModel->AllData();

        return view('home', compact('title', 'datasiswapertahun'));
    }
}

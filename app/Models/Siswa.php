<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'namalengkap', 'jenis_kelamin', 'NISN', 'jurusan', 'nama_jurusan', 'tempatlahir', 'tanggal_lahir', 'wali', 'thn_masuk', 'thn_lulus', 'no_ijazah', 'asalsekolah'
    ];

    public function jrsn()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan', 'id');
    }
    
}

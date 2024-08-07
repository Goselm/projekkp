<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'siswa',
        'karyawan',
        'mata_pelajaran'
    ];
    
    public function Karyawan(){
        return $this->belongsTo(Karyawan::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProgress extends Model
{
    use HasFactory;
    
    protected $table = 'project_progress';
    protected $fillable = ['omset_id', 'tgl_setting', 'teknisi_id', 'dokumentasi', 'status'];

    public function omset()
    {
        return $this->belongsTo(Omset::class, 'omset_id', 'id_omset'); // omset_id di tabel ini dan id_omset di tabel omsets
    }

    public function teknisi()
    {
        return $this->belongsTo(User::class, 'teknisi_id', 'id_user'); // teknisi_id di tabel ini dan id_user di tabel users
    }
}

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
        return $this->belongsTo(Omset::class, 'omset_id');
    }

    public function teknisi()
    {
        return $this->belongsTo(User::class, 'teknisi_id');
    }
}

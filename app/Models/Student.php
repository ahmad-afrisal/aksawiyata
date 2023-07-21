<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'nim_mhs',
        'nama_mhs',
        'angkatan_mhs',
        'prodi_mhs',
        'status_mhs',
        'concentration',
        'about',
        'phone_number',
        'instagram_profile',
        'linkedin_profile',
        'github_profile',
        'transkip',
        'cv',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecture extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'nidn_dosen',
        'nip_dosen',
        'nama_dosen',
        'status_dosen',
        'konsentrasi_dosen',
        'jafung_dosen',
        'hp_dosen',
        'prodi_dosen',
        'aktif',
        'bidang_peminatan'
    ];

    /**
     * Get the user that owns the Checkout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class,);
    }
}

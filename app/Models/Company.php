<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'about',
        'mentor_id',
        'adviser_id',
        'examiner_id',
        'ceo',
        'number_of_employees',
        'website_link',
        'street',
        'postal_code',
        'district',
        'regency',
        'province',
        'logo',
    ];

    public function CompanyGallery()
    {
        return $this->hasMany(CompanyGallery::class, 'companies_id', 'id' );
    }

    public function Adviser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'adviser_id', 'id' );
    }

    public function Examiner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'examiner_id', 'id' );
    }

    public function Mentor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mentor_id', 'id' );
    }
}

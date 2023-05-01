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

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Company;


class CompanyGallery extends Model
{
    use HasFactory;

    protected $fillable = ['photos','companies_id'];
     /**
     * Get the company that owns the CompanyGallery
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

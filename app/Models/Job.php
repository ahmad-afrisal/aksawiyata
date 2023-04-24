<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
            'company_id',
            'name',
            'details_of_activities',
            'develop_competetncies',
            'participant_criteria',
            'additional_information',
            'quota'
        ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

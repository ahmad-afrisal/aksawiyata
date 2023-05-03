<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Checkout;

use Illuminate\Support\Facades\Auth;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
            'company_id',
            'name',
            'slug',
            'details_of_activities',
            'develop_competencies',
            'participant_criteria',
            'additional_information',
            'quota',
            'status'
        ];

    public function getIsRegisteredAttribute()
    {
        if (!Auth::check()) {
            return false;
        }

        return Checkout::whereJobId($this->id)->whereUserId(Auth::id())->exists();
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

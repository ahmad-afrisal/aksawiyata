<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'details_of_activities',
        'develop_competetncies',
        'participant_criteria',
        'additional_information',
        'quota'
    ];
}

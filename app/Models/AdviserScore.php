<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdviserScore extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'adviser_id', 'exercise_score','report_score','presentation_score','final_score'];
}

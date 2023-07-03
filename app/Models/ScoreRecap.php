<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScoreRecap extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'mentor_score','adviser_score','examiner_score'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MentorScore extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','mentor_id','attitude_score','diligent_score','performance_score','final_score'];
}

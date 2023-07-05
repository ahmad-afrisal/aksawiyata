<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExaminerScore extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'examiner_id', 'exercise_score','report_score','presentation_score','final_score'];
}

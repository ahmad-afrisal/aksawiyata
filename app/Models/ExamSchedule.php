<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamSchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['admin_id','exam_date','place','is_open'];
}

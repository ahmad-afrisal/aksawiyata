<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','job_id','report','status','message'];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

}

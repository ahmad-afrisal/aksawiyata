<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScoreRecap extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'mentor_score','adviser_score','examiner_score', 'semester_id'];

    /**
     * Get the user that owns the ScoreRecap
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, );
    }

    public function semester(): BelongsTo
    {
        return $this->belongsTo(Semester::class, );
    }

}

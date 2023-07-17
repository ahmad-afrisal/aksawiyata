<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Examinee extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','exam_id','checkout_id','adviser_id','is_accepted'];

    /**
     * Get the user that owns the Checkout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Schedule(): BelongsTo
    {
        return $this->belongsTo(ExamSchedule::class,'exam_id','id');
    }

    /**
     * Get the user that owns the Checkout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Student(): BelongsTo
    {
        return $this->belongsTo(User::class,'student_id','id');
    }

    /**
     * Get the user that owns the Checkout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function checkout(): BelongsTo
    {
        return $this->belongsTo(Checkout::class,'checkout_id','id');
    }

}

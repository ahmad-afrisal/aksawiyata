<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Logbook extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','date','activity','detail_activity','photo'];

    // public function getIsFilled()
    // {
    //     if (!Auth::check()) {
    //         return false;
    //     }

    //     return Logbook::whereUserId(Auth::id())->exists();
    // }
}

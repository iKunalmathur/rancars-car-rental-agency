<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;
    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }

    //relations
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    // Supporting Methods
    public function imagePath()
    {
        return asset("/storage/" . $this->image);
    }
}

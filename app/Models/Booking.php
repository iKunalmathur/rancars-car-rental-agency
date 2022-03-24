<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes, URLbyUUID;
    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toFormattedDateString();
    }
    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->toDateString();
    }
    public function getEndDateAttribute($value)
    {
        if (!$value) {
            return null;
        }
        return Carbon::parse($value)->toDateString();
    }

    // Relations
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function buyer()
    {
        return $this->belongsTo(User::class, "buyer_id");
    }
    public function owner()
    {
        return $this->belongsTo(User::class, "owner_id");
    }
}

<?php

namespace App\Models;

use App\Traits\URLbyUUID;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, URLbyUUID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        "profile_photo_url"
    ];

    // Relations

    public function role()
    {
        return $this->belongsTo(Role::class, "role_id");
    }
    public function cars()
    {
        return $this->hasMany(Car::class, "owner_id");
    }

    public function bookings()
    {
        switch ($this->role_id) {
            case Role::IS_OWNER:
                return $this->hasMany(Booking::class, "owner_id");
                break;
            case Role::IS_CUSTOMER:
                return $this->hasMany(Booking::class, "buyer_id");
                break;

            default:
                return null;
                break;
        }
    }

    // Supporting Methods
    public function imagePath()
    {
        return asset("/storage/" . $this->image);
    }

    public function getProfilePhotoUrlAttribute()
    {
        return $this->image
            ? asset("/storage/" . $this->image)
            : $this->defaultProfilePhotoUrl();
    }

    protected function defaultProfilePhotoUrl()
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';
    }
}

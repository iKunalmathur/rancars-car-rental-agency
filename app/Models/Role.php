<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const IS_ADMIN = 1;
    public const IS_OWNER = 2;
    public const IS_CUSTOMER = 3;
}

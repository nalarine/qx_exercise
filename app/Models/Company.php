<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

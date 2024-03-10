<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amphure extends Model
{
    protected $fillable = [
        'province_id',
        'amphure_name',
        'zipcode'
    ];
}

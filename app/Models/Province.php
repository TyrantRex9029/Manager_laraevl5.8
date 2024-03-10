<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable = [
        'province_code',
        'province_name',
    ];
    public function Amphure(){
    	return $this->hasMany('\App\Models\Amphure','province_id','id');
    }
}

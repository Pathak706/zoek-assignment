<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $guarded = [];

    public function company_name(){
        return $this->belongsTo(Company::class, 'company', 'id');
    }
}

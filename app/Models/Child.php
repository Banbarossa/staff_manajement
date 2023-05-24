<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Child extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function staff() :HasOne
    {
        return $this->hasOne(Staff::class);
    }
}

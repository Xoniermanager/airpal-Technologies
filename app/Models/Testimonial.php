<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = ['title','username','address','image','description','status'];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url("storage/" .  $value)
        );
    }
}

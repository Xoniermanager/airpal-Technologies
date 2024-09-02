<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteConfig extends Model
{
    use HasFactory;
    protected $fillable = ['name','value','status'];

    protected function logo(): Attribute
        {
            return Attribute::make(
                get: function ($value, $attributes) {
                    // Check if the configuration name suggests an image (logo, favicon, etc.)
                    if (in_array($attributes['name'], ['website_logo', 'website_favicon'])) {
                        return $attributes['value'] ? url('storage/' . $attributes['value']) : null;
                    }
                    return null;
                }
            );
        }
}


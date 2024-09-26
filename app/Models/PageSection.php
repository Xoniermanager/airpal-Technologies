<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageSection extends Model
{
    use HasFactory;
    protected $fillable = ['image','title','subtitle','page_id','section_slug','content'];

    // Get get all added buttons
    public function getButtons()
    {
        return $this->hasMany(SectionButton::class,'section_id');
    }

    // To get with all added contents

    public function getContent()
    {
        return $this->hasMany(SectionContent::class,'section_id');
    }

    // To get with all added text inputs

    public function getImages()
    {
        return $this->hasMany(SectionImage::class,'section_id');
    }

    public function getListing()
    {
        return $this->hasMany(SectionList::class,'section_id');
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => url("storage/" .  $value)
        );
    }


}

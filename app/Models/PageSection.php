<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PageSection extends Model
{
    use HasFactory;
    protected $fillable = ['image','title','subtitle','page_id','section_slug'];

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
}

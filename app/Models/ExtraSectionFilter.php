<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraSectionFilter extends Model
{
    use HasFactory;
    protected $fillable = ['key','value','page_id','status','page_extra_sections_id'];

    public function pageExtraSection()
    {
        return $this->belongsTo(PageExtraSection::class , 'id');
    }

}

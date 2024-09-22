<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','description'];

    public function faqs()
    {
        return $this->hasMany(Faqs::class,'faq_category_id','id');
    }
}

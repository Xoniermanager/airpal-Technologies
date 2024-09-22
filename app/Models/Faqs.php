<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','faq_category_id'];

    public function faqCategory()
    {
        return $this->belongsTo(FaqCategory::class,'faq_category_id','id');
    }
}

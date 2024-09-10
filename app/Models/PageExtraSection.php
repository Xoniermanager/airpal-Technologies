<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PageExtraSection extends Model
{
    use HasFactory;
    
    protected $fillable = ['model','orderby','no_of_records','status','page_id','order_with_column'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageExtraSection extends Model
{
    use HasFactory;
    
    protected $fillable = ['model','orderby','no_of_records','status','page_id'];

}

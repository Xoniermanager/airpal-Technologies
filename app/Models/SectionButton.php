<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionButton extends Model
{
    use HasFactory;
    protected $fillable = ['text','link','section_id','status'];
}

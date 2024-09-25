<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionList extends Model
{
    use HasFactory;
    protected $fillable = ['page_id','title','icon','status','section_id'];

    public function listItems()
    {
        return $this->hasMany(ListItem::class,'section_lists_id');
    }
}

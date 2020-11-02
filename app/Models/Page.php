<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_type', 'title', 'text', 'text_second', 'image', 'image_color', 'image_second', 'image_third', 'video', 'pdf', 'gallery', 'parent_id'
    ];
    
    protected $casts=['gallery'=>'json'];

    public function children()
    {
        return $this->hasMany('App\Models\Page', 'parent_id', 'id');
    }
}

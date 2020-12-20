<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_type', 'title', 'text', 'image', 'video', 'pdf', 'gallery', 'parent_id'
    ];
    
    protected $casts=['gallery'=>'json'];

    public function children()
    {
        return $this->hasMany('App\Models\Page', 'parent_id', 'id');
    }

    public function icons()
    {
        return $this->belongsToMany('App\Models\Icon');
    }
}

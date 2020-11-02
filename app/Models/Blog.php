<?php

namespace App\Models;

class Blog extends Base
{
    protected $table = 'blogs';
    public $primarykey = 'id';
    protected $fillable = [
        'photo',
        'title',
        'article',
        'created_by',
        'updated_by',
    ];
    
    public function comments()
    {
        return $this->morphMany(BlogComment::class, 'blog_comments')->whereNull('parent_id');
    }
}

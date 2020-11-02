<?php

namespace App\Models;

class BlogComment extends Base
{
    protected $table = 'blog_comments';
    public $primarykey = 'id';
    protected $fillable = [
        'name',
        'email',
        'comment',
        'id_blogs',
        'id_parent',
        'created_by',
        'updated_by',
    ];
    public function replies()
    {
        return $this->hasMany(BlogComment::class, 'id_parent');
    }
}

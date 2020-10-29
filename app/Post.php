<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'content_md'];

    protected $appends = ['resume_content'];

    public function getResumeContentAttribute()
    {
        return substr($this->content, 0, 300);
    }
}

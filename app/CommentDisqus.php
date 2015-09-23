<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentDisqus extends Model
{
    protected $table = 'comment_disqus';
    protected $fillable = [
        'comment_id',
        'parent_id',
        'slug',
        'body',
        'author_name',
        'profile_url',
        'gravatar_url',
        'count_post',
        'likes',
        'dislikes',
        'date'

    ];
}

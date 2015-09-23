<?php


namespace App\Repository;


use App\Post;

class BlogRepository {

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function search($page, $search)
    {

    }

}
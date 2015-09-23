<?php
/**
 * Created by PhpStorm.
 * User: waviq
 * Date: 9/17/2015
 * Time: 12:51 PM
 */

namespace App\Repository;


use DB;
use Disqus;

class CommentRepository {

    public function showCode()
    {
        // this is your disqus secret key
        $secret_key = 'he9vhb7QYJihCNpexpBY9ldH1KSB9W0S3VikqB26ZSKJK3HAABqmM9OP9uYjv5mV';

        // create new instance of Disqus API
        $disqus = new Disqus($secret_key);


        // uncomment if you have trouble with secure connections
        //$disqus->setSecure(false);

        // NOTE: if you don't have posts in the table, you need to set $since to dummy date
        // else you need to fix the time format
        $since = str_replace(' ', 'T', DB::table('comment_disqus')->max('date'));

        $params = array(
            'forum'   => 'mastahcode',
            'limit'   => 51,
            'order'   => 'asc',
            'include' => 'approved',
            'related' => 'thread',
            'since'   => $since
        );

        // get a list with all disqus comments since last comment in your local db
        $comments = $disqus->posts->list($params);

        // add comments to your db
        do
        {
            if (count($comments) > 1)
            {

                // unset duplicate comment
                unset($comments[0]);

                // counter
                $n = 0;

                // save comments locally
                foreach ($comments as $comment)
                {
                    //dd($comment);
                    //$slug = $comment->thread->identifiers[0];
                    // NOTE: you may need to manipulate your slug in order to use it later as key

                    $data = array(
                        'comment_id'   => $comment->id,
                        'parent_id'    => $comment->parent,
                        'slug'         => $comment->thread->slug,
                        'count_post'   => $comment->thread->posts,
                        'likes'        => $comment->thread->likes,
                        'dislikes'     => $comment->thread->dislikes,
                        'body'         => strip_tags($comment->message),
                        'author_name'  => $comment->author->name,
                        'profile_url'  => $comment->author->profileUrl,
                        'gravatar_url' => $comment->author->avatar->permalink,
                        'date' => $comment->createdAt

                    );

                    // NOTE: you need appropriated db structure
                    \DB::table('comment_disqus')->insert($data);

                    $n ++;

                }

            }


        } while (count($comments) == 50);
    }
}
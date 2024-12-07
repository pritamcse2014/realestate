<?php

namespace App\Services;

use App\Interfaces\PostInterface;

class WordpressService implements PostInterface
{
    public function publishPost($title, $content)
    {
        info("Publish Post in Wordpress");
    }

    public function getPostDetails($postId)
    {
        info("Get Post Details from Wordpress");
    }
}

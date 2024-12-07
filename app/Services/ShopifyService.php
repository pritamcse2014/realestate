<?php

namespace App\Services;

use App\Interfaces\PostInterface;

class ShopifyService implements PostInterface
{
    public function publishPost($title, $content)
    {
        info("Publish Post in Shopify");
    }

    public function getPostDetails($postId)
    {
        info("Get Post Details from Shopify");
    }
}

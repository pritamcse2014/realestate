<?php

namespace App\Http\Controllers;

use App\Services\ShopifyService;
use Illuminate\Http\Request;

class ShopifyPostController extends Controller
{
    protected $shopifyService;

    public function __construct(ShopifyService $shopifyService)
    {
        $this->shopifyService = $shopifyService;
    }

    public function shopifyPost() {
        $this->shopifyService->publishPost('This is a title.', 'This is a body.');

        return response()->json(['message' => 'Post Published Successfully.']);
    }
}

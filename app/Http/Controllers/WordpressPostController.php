<?php

namespace App\Http\Controllers;

use App\Services\WordpressService;
use Illuminate\Http\Request;

class WordpressPostController extends Controller
{
    protected $wordpressService;

    public function __construct(WordpressService $wordpressService)
    {
        $this->wordpressService = $wordpressService;
    }

    public function wordpressPost() {
        $this->wordpressService->publishPost('This is a title.', 'This is a body.');

        return response()->json(['message' => 'Post Published Successfully.']);
    }
}

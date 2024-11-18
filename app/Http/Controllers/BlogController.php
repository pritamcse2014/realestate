<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function adminBlogList() {
        // echo "Blog List";
        // die();
        return view('admin.blog.list');
    }

    public function adminAddBlog() {
        // echo "Blog List";
        // die();
        return view('admin.blog.add');
    }
}

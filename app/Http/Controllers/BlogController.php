<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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

    public function adminStoreBlog(Request $request) {
        // dd($request->all());
        $save = request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $save = new Blog;
        $save->title = trim($request->title);
        $save->slug = trim($request->slug);
        $save->description = trim($request->description);
        $save->save();

        return redirect('admin/blog')->with('success', 'Blog Create Successfully.');
    }
}
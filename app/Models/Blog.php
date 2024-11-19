<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Blog extends Model
{
    use HasFactory;
    
    protected $table = 'blog';

    static public function getDetails() {
        $return = self::select('blog.*')
                ->orderBy('id', 'desc');
                if (!empty(Request::get('id'))) {
                    $return = $return->where('blog.id', '=', Request::get('id'));
                } if (!empty(Request::get('title'))) {
                    $return = $return->where('blog.title', 'like', '%' . Request::get('title') . '%');
                } if (!empty(Request::get('slug'))) {
                    $return = $return->where('blog.slug', 'like', '%' . Request::get('slug') . '%');
                } if (!empty(Request::get('description'))) {
                    $return = $return->where('blog.description', 'like', '%' . Request::get('description') . '%');
                }
        $return = $return->paginate(10);
        return $return;
    }
}

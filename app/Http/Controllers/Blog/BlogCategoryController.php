<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;

class BlogCategoryController extends Controller
{
    public function getAll()
    {
        return Category::query()->get(["id", "name", "slug"]);
    }
}

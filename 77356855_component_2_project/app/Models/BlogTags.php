<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTags extends Model
{
    protected $table = "blog_tags";
    protected $filleable = [
        "id",
        "blogs_id",
        "tag",
        "created_at",
        "updated_at"
    ];
}

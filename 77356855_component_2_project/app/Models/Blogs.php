<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = "blogs";
    protected $filleable = [
           "id",
           "url",
           "is_trending",
           "author",
           "author_image_url",
           "image_url_portait",
           "image_url_landscape",
           "title",
           "date",
           "description",
           "content",
           "created_at",
           "updated_at"

    ];
}

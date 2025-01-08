<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = ('posts');
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($post)
        {

        });

    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function scopeIsPublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeIsDrafted($query)
    {
        return $query->where('is_published', false);
    }

    public function getPublishedAttribute()
    {
        return ($this->is_published) ? 'Yes' : 'No';
    }
    public function getEtagAttribute()
    {
        return hash ('sha256', "product-{$this->id}-{$this->updated_at}");
    }
}

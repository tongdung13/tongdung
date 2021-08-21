<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $table = 'stories';

    protected $fillable = [
        'story_name',
        'author',
        'image',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'story_categories', 'category_id', 'story_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function story_categories()
    {
        return $this->hasMany(StoryCategory::class);
    }

    public function getImageAttribute($image)
    {
        if ($image != null) {
            return asset('/storage/images/' . $image);
        }
        return null;
    }
}

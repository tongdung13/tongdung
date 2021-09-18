<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryCategory extends Model
{
    use HasFactory;

    protected $table = 'story_categories';

    protected $fillable = [
        'story_id',
        'category_id',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

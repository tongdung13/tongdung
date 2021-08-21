<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'category_name',
    ];

    public function stories()
    {
        return $this->belongsToMany(Story::class, 'story_categories', 'category_id', 'story_id');
    }
}

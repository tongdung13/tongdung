<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $table = 'chapters';

    protected $fillable = [
        'chap',
        'story_id',
        'chapter',
        'content',
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}

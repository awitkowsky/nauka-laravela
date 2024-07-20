<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
* @property string $title
* @property string $content
* @property string $author
*/


class Publication extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author'
    ];
}

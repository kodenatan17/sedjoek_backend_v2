<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'article';
    
    protected $fillable = [
        'title',
        'content',
        'created_by',
        'type',
    ];

}

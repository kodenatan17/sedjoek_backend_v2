<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table= 'events';

    protected $fillable = [
        'title',
        'content',
        'url',
        'created_by',
        'urlImages',
    ];
}

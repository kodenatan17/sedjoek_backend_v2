<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class BannerModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'banners';

    protected $fillable =[
        'urlImage',
    ];

    public function getUrlAttributes($urlImage){
        return config('app.url') . Storage::url($urlImage);
    }
    
}

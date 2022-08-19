<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'description',
        'tags',
        'categories_id',
        'brand_id',
    ];

    public function category(){
        $this->belongsTo(CategoryModel::class, 'categories_id','id');
    }

    public function brand(){
        $this->belongsTo(BrandModel::class, 'brand_id','id');
    }
}

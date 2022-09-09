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
        'stock_id',
        'price',
        'description',
        'tags',
        'categories_id',
        'brand_id',
        'stock',
    ];

    public function stocks(){
        return $this->belongsTo(Stock::class, 'stock_id', 'id');
    }

    public function category(){
        return $this->belongsTo(CategoryModel::class, 'categories_id','id');
    }

    public function brand(){
        return $this->belongsTo(BrandModel::class, 'brand_id','id');
    }

    public function galleries(){
        return $this->hasMany(GalleryModel::class, 'product_id', 'id');
    }

    public function coupon(){
        return $this->hasMany(CouponModel::class, 'product_id', 'id');
    }

    public function gallery(){
        return $this->hasMany(GalleryModel::class, 'id', 'product_id');
    }

    // public function transactiondetails(){
    //     return $this->hasMany(TransactionDetailModel::class, 'product_id','id');
    // }
}

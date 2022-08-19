<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductModel;

class BrandModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'brand_categories';

    protected $fillable = [
        'name',
    ];

    public function brand(){
        return $this->hasMany(ProductModel::class, 'brand_id', 'id'); 
    }
}

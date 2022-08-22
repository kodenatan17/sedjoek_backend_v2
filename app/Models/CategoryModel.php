<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductModel;

class CategoryModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    ];

    public function products(){
        return $this->hasMany(ProductModel::class, 'id', 'categories_id'); 
    }
}

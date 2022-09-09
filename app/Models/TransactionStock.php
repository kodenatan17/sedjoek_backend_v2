<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionStock extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stocks';

    protected $fillable = [
        'id',
        'stock_id',
        'transaction_id',
        'qty',
        'additional_price'
    ];

    public function product(){
        return $this->hasMany(ProductModel::class, 'id', 'stock_id');
    }

    public function transaction(){
        return $this->hasMany(TransactionModel::class, 'id', 'transaction_stock_id');
    }

    public function stocks(){
        return $this->belongsTo(Stock::class, 'stock_id', 'id');
    }
}

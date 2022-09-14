<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionStock extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaction_stock';

    protected $fillable = [
        'stock_id',
        'transaction_id',
        'qty',
        'additional_price'
    ];

    public function product(){
        return $this->hasMany(ProductModel::class, 'id', 'stock_id');
    }

    public function transaction(){
        return $this->hasMany(TransactionModel::class, 'id', 'transaction_id');
    }

    public function installitationControl()
    {
        return $this->hasMany(InstallitationControlModel::class, 'id', 'transaction_id');
    }

    public function transaction_stock()
    {
        return $this->belongsTo(Stock::class, 'id', 'stock_id');
    }

    public function stocks(){
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}

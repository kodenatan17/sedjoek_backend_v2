<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stocks';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
        'qty'
    ];

    public function products(){
        return $this->hasMany(ProductModel::class, 'id', 'stock_id');
    }

    public function transaction(){
        return $this->hasMany(TransactionModel::class, 'id', 'transaction_stock_id');
    }

    public function transactionStock(){
        return $this->hasMany(TransactionStock::class, 'id', 'stock_id');
    }

    public function installitationControl(){
        return $this->hasMany(InstallitationControlModel::class, 'id', 'transaction_stock_id');
    }
}

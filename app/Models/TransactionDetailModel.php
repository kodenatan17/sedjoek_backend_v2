<?php

namespace App\Models;

use App\Models\TransactionModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetailModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaction_details';

    protected $fillable = [
        'users_id',
        'products_id',
        'transaction_id',
        'quantity',
    ];

    public function transaction()
    {
        $this->belongsTo(TransactionModel::class, 'transaction_details_id', 'id');
    }

    public function user(){
        $this->belongsTo(User::class, 'users_id','id');
    }

    public function product(){
        $this->belongsTo(ProductModel::class, 'products_id','id');
    }
}

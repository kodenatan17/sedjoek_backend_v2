<?php

namespace App\Models;

use App\Http\Controllers\TransactionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = [
        'name',
        'users_id',
        'address',
        'payment',
        'total_price',
        'shipping_price',
        'status',
    ];

    public function transaction()
    {
        $this->hasMany(TransactionController::class, 'transaction_id', 'id');
    }
}
<?php

namespace App\Models;

use App\Http\Controllers\TransactionDetailController;
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

    public function transaction_detail()
    {
        $this->hasMany(TransactionDetailController::class, 'transaction_details_id', 'id');
    }
}

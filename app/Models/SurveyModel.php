<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SurveyModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = [
        'transaction_stock_id', 'users_id', 'address', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function transactionStock(){
        return $this->belongsTo(TransactionStock::class, 'transaction_stock_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionPeriodeModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'periode_transactions';

    protected $fillable = [
        'transaction_details_id',
        'started_at',
        'finished_at',
    ];

    public function transaction_detail()
    {
        return $this->belongsTo(TransactionDetailModel::class, 'transaction_details_id', 'id');
    }
}

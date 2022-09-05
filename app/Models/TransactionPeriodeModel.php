<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionPeriodeModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transaction_periodes';

    protected $fillable = [
        'transaction_id',
        'started_at',
        'finished_at',
    ];

    public function transaction()
    {
        return $this->belongsTo(TransactionModel::class, 'transaction_id', 'id');
    }
}

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
        'name',
        'users_id',
        'transaction_stock_id',
        'technician_users_id',
        'address',
        'payment',
        'total_price',
        'shipping_price',
        'status',
        'photo_location',
        'photo_point_installation',
        'photo_unit',
        'photo_indoor_installation',
        'photo_outdoor_installation',
        'photo_ac_on',
        'photo_pipe_used',
        'description_survey',
        'description_install',
        'description_finish'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function transaction_stocks()
    {
        return $this->belongsTo(TransactionStock::class, 'transaction_stock_id');
    }

    public function technicians()
    {
        return $this->belongsTo(Technician::class, 'technician_users_id');
    }

}

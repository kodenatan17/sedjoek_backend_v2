<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class InstallitationControlModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = [
        'name', 'users_id', 'transaction_stock_id', 'address', 'payment',
        'total_price', 'shipping_price', 'status', 'photo_location', 'photo_point_installation',
        'photo_unit', 'photo_indoor_installation', 'photo_outdoor_installation', 'photo_ac_on', 'photo_pipe_used',
        'description_survey', 'description_install', 'description_finish'
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}

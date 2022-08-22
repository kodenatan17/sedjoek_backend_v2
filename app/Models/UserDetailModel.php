<?php

namespace App\Models;

use App\Models\User;
use App\Http\Controllers\UserDetailController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetailModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_detail';

    protected $fillable = [
        'name_full',
        'users_id',
        'ktp',
        'ktp_address',
        'home_address',
        'status_residence',
        'profession',
        'closest_family_phone',
        'closest_family_name',
        'closest_family_relation',
        'users_id',
        'emergency_surename',
        'emergency_address',
        'image_ktp',
        'image_kk',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id','id');
    }
}

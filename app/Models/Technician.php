<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technician extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'technician';

    protected $primaryKey = 'id';

    protected $fillable = [
        'transaction_id',
        'transaction_period',
        'technician_id',
        'before_photo',
        'after_photo'
    ];

    public function installitationControl(){
        return $this->hasMany(InstallitationControlModel::class, 'id', 'technician_user_id');
    }
    public function surveys()
    {
        return $this->hasMany(SurveyModel::class, 'id', 'technician_user_id');
    }

    public function technicians(){
        return $this->hasMany(Technician::class, 'technician_id');
    }

    public function technician_users(){
        return $this->belongsTo(User::class, 'technician_id');
    }

}

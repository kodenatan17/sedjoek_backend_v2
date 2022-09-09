<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstallationModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = [
        'name', 'users_id', 'address', 'status'
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}

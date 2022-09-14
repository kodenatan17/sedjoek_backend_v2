<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *
     */

    protected $table = 'employee';


    protected $fillable = [
        'nik',
        'name',
        'jobs',
        'phone',
        'address',
        'join_date'
    ];
    public function user(){
        return $this->hasMany(User::class, 'employee_id' , 'nik');
    }
}

<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class reg extends Model
{
    //
    protected $table='user';
    public $primaryKey="id";
    public $timestamps=false;
    protected $fillable=['username','email','mobile','password','created_at','updated_at'];
}

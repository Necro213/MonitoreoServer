<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Root extends Model
{

    protected $table = "usr_root";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','username', 'password', 'activo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    
	protected $fillable = [
        'name', 'email', 'password', 'role_id', 'company_id', 'created_by', 'updated_by', 'deleted_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}

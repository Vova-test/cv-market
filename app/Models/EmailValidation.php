<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailValidation extends Model
{
    protected $table = 'email_validation';
    public $timestamps = true;
    protected $guarded = [
    	'id',
    	'created_at',
    	'updated_at'
 	];
}

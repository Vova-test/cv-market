<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    protected $table = 'cv';
    public $timestamps = true;
    protected $guarded = [
    	'id',
    	'created_at',
    	'updated_at'
 	];

 	public function scopeOfChecked($query, $checked)
    {
        return $query->where('checked', $checked);
    }
}

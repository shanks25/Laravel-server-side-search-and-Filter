<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	public function scopeFrance($query)
	{
		return $query->where('country','France');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'doctype', 'order_title', 'order_level', 'no_of_pages', 'spacing', 'discipline', 'deadline', 'client_price', 'citation', 'no_of_sources', 'instructions', 'approved', 'paid', 'banned', 'available', 'assigned', 'removed_order', 'fined'

    ];

    public function users()
	{
	    return $this->belongsToMany('App\User');
	}
}

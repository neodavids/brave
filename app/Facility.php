<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'facilities';

		protected $fillable = ['name','type','description'];

		public function users(){
			return $this->belongsToMany(User::class);
		}

		public function bookings(){
			return $this->hasMany(Booking::class);
		}

		public function shoots(){
			return $this->belongsToMany(Shoot::class);
		}

		public function docs(){
			return $this->belongsToMany(Doc::class);
		}

		public function shows(){
			return $this->belongsToMany(Show::class);
		}

		
    
}

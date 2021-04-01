<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'bookings';

		protected $fillable = ['user','date','start_time','end_time','meeting_description','facility'];

		public function users(){
			return $this->belongsToMany(User::class);
		}

		public function facilities(){
			return $this->belongsToMany(Facility::class);
		}

		
    
}

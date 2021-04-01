<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Show extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'shows';

		protected $fillable = ['user','date','show_description','studio','start_time','end_time'];

		public function users(){
			return $this->belongsToMany(User::class);
		}

		public function departments(){
			return $this->hasMany(Department::class);
		}

		public function facilities(){
			return $this->hasMany(Facility::class);
		}

		
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shoot extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'shoots';

		protected $fillable = ['name','start_date','end_date','status','producer_1','producer_2','producer_3','producer_4','description'];

		public function users(){
			return $this->belongsToMany(User::class);
		}

		public function facilities(){
			return $this->hasMany(Facility::class);
		}

		
    
}

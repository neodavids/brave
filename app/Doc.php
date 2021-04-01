<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doc extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'docs';

		protected $fillable = ['title','download_link','last_updated'];

		public function users(){
			return $this->belongsToMany(User::class);
		}

		public function facilities(){
			return $this->hasMany(Facility::class);
		}

		
    
}

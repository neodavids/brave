<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'messages';

		protected $fillable = ['title','body','sender'];

		public function users(){
			return $this->belongsToMany(User::class);
		}

		public function departments(){
			return $this->hasMany(Department::class);
		}

		
    
}

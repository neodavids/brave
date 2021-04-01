<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'departments';

		protected $fillable = ['name','head_of_department'];

		public function users(){
			return $this->belongsToMany(User::class);
		}

		public function issues(){
			return $this->belongsToMany(Issue::class);
		}

		public function shows(){
			return $this->belongsToMany(Show::class);
		}

		public function messages(){
			return $this->belongsToMany(Message::class);
		}

		
    
}

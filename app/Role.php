<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'roles';

		protected $fillable = ['name'];

		public function users(){
			return $this->belongsToMany(User::class);
		}

		
    public function getRouteKeyName(){
			return 'slug';
		}
}

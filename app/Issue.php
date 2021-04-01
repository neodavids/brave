<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'issues';

		protected $fillable = ['item_name','description','date','location','raised_by','department','status','solved_by','action_taken','cause_of_breakdown','engineers_comment'];

		public function users(){
			return $this->belongsToMany(User::class);
		}

		public function departments(){
			return $this->hasMany(Department::class);
		}

		
    
}

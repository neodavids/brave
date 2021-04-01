<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    		public function role(){
			return $this->hasOne(Role::class);
		}

		public function bookings(){
			return $this->hasMany(Booking::class);
		}

		public function issues(){
			return $this->hasMany(Issue::class);
		}

		public function shoots(){
			return $this->hasMany(Shoot::class);
		}

		public function docs(){
			return $this->hasMany(Doc::class);
		}

		public function shows(){
			return $this->hasMany(Show::class);
		}

		public function messages(){
			return $this->hasMany(Message::class);
		}

		public function departments(){
			return $this->hasMany(Department::class);
		}

		public function facilities(){
			return $this->hasMany(Facility::class);
		}

		public function scopeIsAdmin(){
			return $this->roles->contains('name','Admin');
		}

		public function scopeIsManager(){
			return $this->roles->contains('name','Manager');
		}

		public function scopeIsStaff(){
			return $this->roles->contains('name','Staff');
		}

		public function scopeIsIntern(){
			return $this->roles->contains('name','Intern');
		}

		
}

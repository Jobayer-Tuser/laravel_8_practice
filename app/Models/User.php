<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory; 
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    
    #one to one relationship
    public function post(){
        #when we run this by default it will serch for 'user_id' colum in post table but (see bellow example)
        return $this->hasOne('App\Models\Post');
        
        #if we want/change the 'user_id' name as another like 'admin_id' then we have to give the column name as second parameter
        #return $this>hasOne('App\Models\Post', 'admin_id');
        
        #if we want/change the post table 'id' then we have to give the name as third paramin in funtion 
        #return $this>hasOne('App\Models\Post', 'admin_id', 'user_id');
    }
    
    #one to many relationship
    public function posts(){
        
        return $this->hasMany('App\Models\Post');
        
    }
    
    
    #many to many relationship between user table and roles table
    public function roles(){
        
        return $this->belongsToMany('App\Models\Role');
        /*here is qoute that we are following the laravel convention to create a datatable that's  why when 
        we are calling the upper function we dont have  to do anything manually but if we dont 
        follow the convention then we have to use custom relation by passing the parameter like example bellow*/
        
        //return $this->belongsToMany('App\Models\Role', 'users_role', 'user_id', 'role_id');
    }
    
    #polymorphic relation 
    public function photos(){
        
        return $this->morphMany('App\Models\Photo', 'imageable');
    }
    
    
}

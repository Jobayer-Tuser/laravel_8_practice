<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //use HasFactory;
    
    #polymorphic many realtion
    public function posts(){
        
        return $this->hasManyThrough('App\Models\Post', 'App\Models\User');
        
        /*
            as we learn before laravel by convention they use the name conutry_id, user_id as foreign key
            so we dont have to pass them as parameter but if you use other name then you have to pass name like bellow
            here country_id -> referce to App\Models\User, user_id-> referce to App\Models\Post;
        */
        
        //return $this->hasManyThrough('App\Models\Post', 'App\Models\User', 'country_id', 'user_id');
    }
}

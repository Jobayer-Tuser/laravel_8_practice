<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //use HasFactory;
    
    #polymorphic relation
    public function imageable(){
        
        return $this->morphTo();
    }
}

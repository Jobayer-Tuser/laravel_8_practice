<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //use HasFactory;
   /* 
   when we create a model default it has access autometicaly 
   if we make changes in any table name then we can define the table name from here
   
    public $table = 'posts';
    protected $primaryKey = 'post_id';
    
    protected $fillAble = [
        'title' ,
        'content'
    ]
    */
    
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    #function for one to one relationship 
    public function user(){
        
        return $this->belongsTO('App\Models\User');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use softDeletes;


    protected $fillable = ["title", "contant","featured","category_id", "slug"];

    /*public function getFeaturedAttribute($featured){
        return asset($featured);
    }*/

    protected $dates = ['deleted_at'];


    public  function category(){

        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}

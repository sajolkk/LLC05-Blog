<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
	//protected $primaryKey = 'category_id';


    protected $fillable = [
   		'category_id', 'name', 'slug', 'status',
    ];

    public function post()
    {
    	return $this->hasMany(Post::class,'category_id','category_id');
    }
}

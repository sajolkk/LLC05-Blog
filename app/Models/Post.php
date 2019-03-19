<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Events\PostCreated;
use App\Events\PostUpdated;
use App\Events\PostDeleted;
class Post extends Model
{
    



    protected $date = [
        'created_at', 'updated_at',
    ];


    protected $fillable = [
  		'user_id','category_id','title','content','image','status',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id','category_id');
    }

    public function user()
    {
    	return $this->belongsTo(User::class,'user_id','user_id');
    }

    protected $dispatchesEvents = [
        'created' => PostCreated::class,
        'updated' => PostUpdated::class,
        'deleted' => PostDeleted::class,
    ];
}

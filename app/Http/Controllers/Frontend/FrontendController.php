<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use DB;
use App\Models\Post;

class FrontendController extends Controller
{
    public function index()
    {
    	$data = [];

    	
    	$data['aritcle'] = cache('aritcle', function (){
    		return Post::with('category','user')->orderby('created_at','desc')->take(20)->get();
    	});

    	return view('index',$data);
    }
}

<?php

namespace App\Http\Controllers\Backend\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Validator;
use App\Models\Category;
use Auth;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::with('category','user')->orderby('id','desc')->paginate(5);

        return view('backend.post.all-post',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [];
        $data['category'] = Category::all();
        return view('backend.post.add-post', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Validator::make($request->all(),[
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        if ($check->fails()) {
            return back()->withErrors($check)->withInput();
        }

        $data = array();
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['category_id'] = $request->category_id;
        $data['status'] = $request->status;
        $data['user_id'] = Auth::user()->user_id;
        //$data['user_id'] = Auth::user()->user_id;

        $result = Post::insert($data);
        if ($result) {
            cache()->forget('aritcle');
            $post = Post::with('category','user')->orderby('created_at','desc')->take(20)->get();
            cache()->forever('aritcle', $post);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return view('backend.post.show-post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('backend.post.edit-post',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

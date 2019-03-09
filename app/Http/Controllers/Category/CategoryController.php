<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\Models\Category;
use Session;
use Illuminate\Validation\Rule;
class CategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }


    public function index()
    {
    	$data = [];
    	$data['categories']= Category::orderby('category_id', 'desc')->get();

    	return view('backend.category.all-category', $data);
    }

    public function add()
    {
        return view('backend.category.add-category');
    }

    public function store(Request $request)
    {
        $check = Validator::make($request->all(),[
            'name' => 'required|unique:categories,name',
            'slug' => 'required',
            'status' => 'required',
        ]);

        if ($check->fails()) {
            return back()->withErrors($check)->withInput();
        }

        $category_id = Category::max('category_id') + 1;
        if ($category_id == 1) {
            $category_id = 101;
        }
        $data = array();
        $data['category_id'] = $category_id;
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['status'] = $request->status;
        $result = Category::insert($data);
        if ($result) {
            session::flash('message', 'Category Add Successfully');
            return back();
        }
    }

    public function show($id)
    {
        $category = Category::with('post','post.user')->where('category_id', $id)->first();
        //dd($category);
        return view('backend.category.show-category',compact('category'));
    }

    public function edit($id)
    {
        $category = Category::where('category_id', $id)->first();
        return view('backend.category.edit-category',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $check = Validator::make($request->all(),[
            'name' => ['required',Rule::unique('categories','name')->ignore($id,'category_id'),
                ],
            'slug' => 'required',
            'status' => 'required',
            
        ]);

        if ($check->fails()) {
            return back()->withErrors($check)->withInput();
        }

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['status'] = $request->status;
        $result = Category::where('category_id', $id)->update($data);
        if ($result) {
            session::flash('message', 'Category Add Successfully');
            return redirect(route('dashboard.category.show',$id));
        }


    }

    public function delete($id)
    {
        $result = Category::where('category_id', $id)->delete();
        if ($result) {
            session::flash('message', 'Category Destroy Successfully');
            return redirect(route('dashboard.category.index'));
        }
    }

}

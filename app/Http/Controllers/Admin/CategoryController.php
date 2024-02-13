<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('v1.index.admin.category.add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories=Category::all();
        $category=Category::findorfail($id);
        return view('v1.index.admin.category.edit',compact(['category','categories']));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $atribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate(request(),[
            'parent_id'=>'numeric',
            'name'=>'required|min:3|max:100|alpha',

        ]);
        try{
            $category=Category::findorfail($id);
            $category->name=$request->input('name');
            $category->parent_id=$request->input('parent_id');
            $category->save();
            Session::flash('category_success','عملیات موفقیت آمیز بود');
            return view('v1.index.admin.category.list');
        }catch (\Exception $er){
            Session::flash('category_error','خطا در انجام عملیات');
            return redirect('admin/category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

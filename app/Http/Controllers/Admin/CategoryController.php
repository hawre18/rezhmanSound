<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

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
        if(View::exists('v1.index.admin.category.add')){
            $categories=Category::all();
            return view('v1.index.admin.category.add',compact(['categories']));
        }else{
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required|min:3|max:100|regex:/^[ آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ\s]+$/',
            'parent_id'=>'numeric'
        ]);
        try{
            $category=new Category();
            $category->name=$request->input('name');
            $category->parent_id=$request->input('parent_id');
            $category->admin_id=1;
            $category->save();
            Session::flash('category_success','عملیات موفقیت آمیز بود');
            return redirect('admin/categories');
        }catch (\Exception $er){
            Session::flash('category_error','خطا در انجام عملیات');
            return redirect('admin/categories');
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

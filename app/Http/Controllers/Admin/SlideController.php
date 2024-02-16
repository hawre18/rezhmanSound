<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(View::exists('v1.index.admin.slider.list')){
            $slides=Slide::with('image')->paginate(10);
            return view('v1.index.admin.slider.list',compact(['slides']));
        }else{
            abort(Response::HTTP_NOT_FOUND);
        }

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
        try{
            $slide=Slide::findorfail($id);
            $slide->delete();
            Session::flash('slide_success','عملیات موفقیت آمیز بود');
            return redirect('admin/slides');
        }catch (\Exception $er){
            Session::flash('slide_error','خطا در انجام عملیات');
            return redirect('admin/slides');
        }
    }
}

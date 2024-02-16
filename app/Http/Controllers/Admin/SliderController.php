<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('v1.index.admin.slider.edit');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(View::exists('v1.index.admin.slider.add')){
            $sliders=Slider::all();
            return view('v1.index.admin.slider.add',compact(['sliders']));
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
            'title'=>'required|min:3|max:100|regex:/^[ آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ\s]+$/'
        ]);
        try{
            $slider=new Slider();
            $slider->title=$request->input('title');
            $slider->body=$request->input('body');
            $slider->links=$request->input('links');
            $slider->image_id=1;
            $slider->admin_id=1;
            $slider->save();
            Session::flash('slider_success','عملیات موفقیت آمیز بود');
            return redirect('admin/sliders');
        }catch (\Exception $er){
            Session::flash('slider_error','خطا در انجام عملیات');
            return redirect('admin/sliders');
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

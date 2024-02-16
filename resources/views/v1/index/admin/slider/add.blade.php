@extends('v1.template.admin.app')
@section('content')
<div class="contentAddSlider">
    <div class="addSliderTitle"><h3>افزودن اسلایدر جدید</h3></div>
    <div class="addSliderForm">
        @if(Session::has('slider_error'))
            <div class="alert alert-error">
            </div>{{Session('slider_error')}}<div>
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{url('admin/sliders/index')}}" method="post">
            @csrf
        <div class="addSliderPanel">پنل</div>
        <label class="labelSliderTitle">*</label><p class="paragragh">عنوان</p>
        <input class="inputSliderTitle" type="text" placeholder="فارسی" name="title" >
        <p class="paragragh">لینک</p>
        <input class="inputSliderTitle" type="text" name="link" >
        <p class="paragragh">توضیحات</p>
        <input class="inputSliderTitle" type="text" name="body" maxlength="50" placeholder="50کاراکتر">
        <p class="paragragh">وضعیت</p>
        <input type="checkbox" id="checkboxAddSlider" >
        <label for="checkboxAddSlider" class="tougelBouton"></label>
        <br>
      <input type="file">
            @foreach($sliders as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
        <button id="submitAddSlider" type="submit">ثبت فرم</button>
        </form>
        <div>
</div>
@endsection

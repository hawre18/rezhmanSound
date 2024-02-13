@extends('v1.template.admin.app')
@section('content')
<div class="contentAddSlider">
    <div class="addSliderTitle"><h3>افزودن اسلایدر جدید</h3></div>
    <div class="addSliderForm">
        <div class="addSliderPanel">پنل</div>
        <label class="labelSliderTitle">*</label><p class="paragragh">عنوان</p>
        <input class="inputSliderTitle" type="text" name="text" >
        <p class="paragragh">لینک</p>
        <input class="inputSliderTitle" type="text" name="link" >
        <p class="paragragh">توضیحات</p>
        <input class="inputSliderTitle" type="text" name="text" maxlength="50" placeholder="50کاراکتر">
        <p class="paragragh">وضعیت</p>
        <input type="checkbox" id="checkboxAddSlider" >
        <label for="checkboxAddSlider" class="tougelBouton"></label>
        <br>
      <input type="file">
        <button id="submitAddSlider" type="submit">ثبت فرم</button>
    </div>
@endsection

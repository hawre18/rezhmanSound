@extends('v1.template.admin.app')
@section('content')
<div class="editSlider">
    <div class="tittleSlideEdit">ویرایش اسلایدر</div>
    <div class="SlideEditeForm">
        <div class="SlideEditPanel">پنل</div>

        <label for="eslid"><p style="color: red;">*</p>عنوان</label><br>
        <input type="text" name="eslid" placeholder="اسلایدر" id="eslid"><br>
        <label class="labelLink" for="link">لینک</label><br>
        <input type="text" name="link" id="link"><br>
        <label class="labelDescription" for="add">توضیحات</label><br>
        <input type="text" name="add"  placeholder="توضیحات اسلایدر" id="add"><br>
        <label class="labelDescription" for="check">وضعیت</label><br>
        <input type="checkbox" id="checkboxAddSlider" >
        <label for="checkboxAddSlider" class="tougelBouton"></label><br>
        <label class="labelDescription" for="image">عکس قبلی</label><br>
        <img src="image/3b40f8e0-4afe-11ee-8cd0-57fad1da1e3e.jpg" class="image" id="image"> <br>
        <a href="#" class="p7">حذف</a><br>
        <label class="labelDescription" for="image">عکس جدید</label><br>
        <div class="test4">
           <input type="file">
        </div>
        <input type="submit" name="click" value="ثبت فرم" id="box">
    </div>

</div>
@endsection

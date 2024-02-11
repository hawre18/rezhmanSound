@extends('v1.template.admin.app')
    @section('content')
<div class="headAddCategory">
    <h3 style="background: black;"> افزودن دسته بندی</h3>
    <div class="formAddCategory">
        <form action="">
            <p style="margin-right: 8%;"> <span>*</span> عنوان دسته بندی</p>
            <p style="margin-right: 33%;"> <span>*</span> دسته بندی والد</p><br>
            <input class="nameCategory" type="text" placeholder="فارسی">

            <select class="selectAddCategory" name="" id="">
                <option value="" selected disabled> انتخاب کنید</option>
                <option value=""></option>
            </select>
            <br>
            <br>
            <button class="buttonAddCategory" type="submit"> ثبت</button>
        </form>
    </div>
</div>
@endsection

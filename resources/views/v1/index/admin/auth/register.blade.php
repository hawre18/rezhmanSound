@extends('v1.template.admin.app')
@section('content')
<div class="start">
    <h2>ثبت نام</h2>
    <img src="{{asset('assets/v1/admin/image/3.jpg')}}">
    <label class="enter" >مشخصات</label>
    <form action="{{route('registertion')}}" method="post">
        @csrf
        <label class="label" >*</label><p>نام</p><br>
        <input class="enter1" type="text" name="fName" placeholder="نام" ><br>
        <label class="label" >*</label><p>نام خانوادگی</p><br>
        <input class="enter1" type="text" name="lName" placeholder="نام خانواندگی"><br>
        <label class="label" >*</label><p>نام کاربری</p><br>
        <input class="enter1" type="text"name="UserName" placeholder="لاتین"><br>
        <label class="label" >*</label><p>ایمیل</p><br>
        <input id="email" class="enter1" type="email" name="email" placeholder="axample@gmail.com" >
        <img id="img2" src="{{asset('assets/v1/admin/image/2.png')}}" ><br>
        <label class="label" >*</label><p>رمز عبور</p><br>
        <input class="enter1" type="password" name="password" placeholder="حداقل 8 کاراکتر">
        <img id="img2"  src="{{asset('assets/v1/admin/image/2.png')}}" ><br><br>
        <button class="click" type="submit" >ثبت نام</button>
    </form>
    </div>

@endsection

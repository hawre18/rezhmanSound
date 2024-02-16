@extends('v1.template.admin.app')
@section('content')
    <div class="headAddCategory">
        <h3 style="background: black;"> ویرایش دسته بندی</h3>
        <div class="formAddCategory">
            @if(Session::has('category_error'))
                <div class="alert alert-error">
                    <div>{{Session('category_error')}}</div>
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
            <form action="{{route('update.category',$category->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <p style="margin-right: 8%;"> <span>*</span> عنوان دسته بندی</p>
                <p style="margin-right: 33%;"> <span>*</span> دسته بندی والد</p><br>
                <input class="nameCategory" type="text" placeholder="فارسی" name="name" id="name" value="{{$category->name}}">
                <select class="selectAddCategory" name="parent_id" id="parent_id">
                    <option value="" selected disabled> انتخاب کنید</option>
                    @foreach($categories as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <button class="buttonAddCategory" type="submit"> ثبت</button>
            </form>
        </div>
    </div>
@endsection

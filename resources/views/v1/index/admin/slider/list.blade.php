@extends('v1.template.admin.app')
@section('content')
    <div>
        <h2> لیست دسته بندی ها</h2>
        <table>
            <tr class="tableListCategory">
                <th class="thListCategory" colspan="2"> ردیف</th>
                <th class="thListCategory" colspan="2"> عنوان</th>
                <th class="thListCategory" colspan="2"> توضیحات</th>
                <th class="thListCategory" colspan="2"> عملیات</th>
            </tr>
            @foreach($slides as $slide)
            <tr>
                <td class="tableListCategory" colspan="2">{{$loop->index+1}}</td>
                <td class="tableListCategory" colspan="2"> {{$slide->title}}</td>
                <td class="tableListCategory" colspan="2"> {{$slide->description}}</td>
                <td class="tableListCategory" colspan="2">
                    <img src="{{asset('assets/v1/admin/image/visible.png')}}" alt="" usemap="#photo1">
                </td>
                <td class="tableListCategory" colspan="2">
                    <img src="{{asset('assets/v1/admin/image/visible.png')}}" alt="" usemap="#photo1">
                    <a href="{{route('delete.slide',$slide->id)}}"><img src="{{asset('assets/v1/admin/image/delete.png')}}" alt="" usemap="#photo1"></a>
                    <img src="{{asset('assets/v1/admin/image/pencil.png')}}" alt="" usemap="#photo1">
                </td>
                <map name="photo1">
                    <area shape="circle" coords="14,12,13" href="" alt="" target="_blank" title="">
                </map>
            </tr>
            @endforeach
        </table>
    </div>
@endsection

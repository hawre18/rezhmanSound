@extends('v1.template.admin.app')
@section('content')
<div>
    <h2> لیست دسته بندی ها</h2>
    <table>
        <tr class="tableListCategory">
            <th class="thListCategory" colspan="2"> ردیف</th>
            <th class="thListCategory" colspan="2"> نام</th>
            <th class="thListCategory" colspan="2"> عملیات</th>
        </tr>
        <tr>
            <td class="tableListCategory" colspan="2"> 1</td>
            <td class="tableListCategory" colspan="2"> dxcdsc</td>
            <td class="tableListCategory" colspan="2">
                <img src="{{asset('assets/v1/admin/image/visible.png')}}" alt="" usemap="#photo1">
                <img src="{{asset('assets/v1/admin/image/delete.png')}}" alt="" usemap="#photo1">
                <img src="{{asset('assets/v1/admin/image/pencil.png')}}" alt="" usemap="#photo1">
            </td>
            <map name="photo1">
                <area shape="circle" coords="14,12,13" href="" alt="" target="_blank" title="">
            </map>
        </tr>
        <tr class="tableListCategory">
            <td class="tableListCategory" colspan="2"> 2</td>
            <td class="tableListCategory" colspan="2"> dvsdv</td>
            <td class="tableListCategory" colspan="2">
                <img src="{{asset('assets/v1/admin/image/visible.png')}}" alt="" usemap="#photo1">
                <img src="{{asset('assets/v1/admin/image/delete.png')}}" alt="" usemap="#photo1">
                <img src="{{asset('assets/v1/admin/image/pencil.png')}}" alt="" usemap="#photo1">
            </td>
        </tr>
    </table>
</div>
@endsection

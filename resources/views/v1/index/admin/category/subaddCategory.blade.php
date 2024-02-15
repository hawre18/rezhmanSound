@foreach($categories as $row)
    <tr>
        <td class="tableListCategory" colspan="2"> 1</td>
        <td class="tableListCategory" colspan="2"> dxcdsc</td>
        <td class="tableListCategory" colspan="2">
            <form action="{{route('categories.destroy',$row->id)}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit">DE</button>
            <form/>
                <img src="{{asset('assets/v1/admin/image/visible.png')}}" alt="" usemap="#photo1">
            <img src="{{asset('assets/v1/admin/image/delete.png')}}" alt="" usemap="#photo1">
            <img src="{{asset('assets/v1/admin/image/pencil.png')}}" alt="" usemap="#photo1">
        </td>
        <map name="photo1">
            <area shape="circle" coords="14,12,13" href="" alt="" target="_blank" title="">
        </map>
    </tr>
        @if(count($sub_category->childrenRecursive)>0)
            @include('index.admin.category.subaddCategory',['category'=>$sub_category->childrenRecursive , 'level'=>$level+1])
            @endforeach

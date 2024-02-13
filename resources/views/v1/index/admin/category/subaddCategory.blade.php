@foreach($categories as $sub_addcategory)
    <tr>
        <th class="p-3">{{$loop->index+1}}</th>
        <td class="py-3">
            <a href="#" class="text-dark">
                <div class="d-flex align-items-center">
                    <span class="me-2">{{$sub_addcategory->name}}</span>
                </div>
            </a>
        </td>
        <td class="p-3">{{str_repeat('----',$level). $sub_addcategory->title}}</td>
        <td class="text-start">
            <a href="#" class="btn btn-icon btn-pills btn-soft-primary"
               data-bs-toggle="modal" data-bs-target="#viewprofile"><i
                    class="uil uil-eye"></i></a>
            <a href="{{route('categories.edit',$sub_addcategory->id)}}" class="btn btn-icon btn-pills btn-soft-success"><i class="uil uil-pen"></i></a>
            <a href="{{route('categories.delete',$sub_addcategory->id)}}" class="btn btn-icon btn-pills btn-soft-danger"><i class="uil uil-trash"></i></a>
        </td>
    </tr>
    @if(count($sub_addcategory->childrenRecursive)>0)
        @include('v1.index.admin.category.subaddCategory',['categories'=>$sub_addcategory->childrenRecursive , 'level'=>$level+1])
    @endif
@endforeach

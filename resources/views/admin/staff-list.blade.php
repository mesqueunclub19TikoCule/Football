@extends ('layouts.app')
@section('title','Staff list')
@section('page-name','Staff list')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class=" panel-heading">
                    All Staff
                    <a href="{{route("staff.create")}}" class="btn btn-primary pull-right btm-sm" role="button" style="margin: -7px">Staff</a>
                </div>
                <div class="panel-body" id="sortable">
                    @if(asset($staff) && is_object($staff))
                        <table class="table striped table-bordered table-hover" id="dataTables-example"
                               style="width: 100% ">
                            <thead>
                            <tr>
                                <th>
                                    id
                                </th>
                                <th>
                                    Firstname
                                </th>
                                <th>
                                    Lastname
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Profession
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>

                            </tr>

                            </thead>

                            <tbody>
                            @foreach($staff as $mem)
                                <tr class="odd gradeX ">
                                    <td>{{$mem->id}}</td>
                                    <td>{{$mem->name}}</td>
                                    <td>{{$mem->surname}}</td>
                                    <td><img src="{{asset("images/".$mem->img)}}" style="width: 100px;height: 100px "  alt="{{$mem->img}}"></td>
                                    <td>{{$mem->prof}}</td>
                                    <td>{{$mem->desc}}</td>
                                    <td><a href="{{route('staff.edit',$mem->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit fa-fw"></i></a></td>
                                    <td>
                                        <form action="{{route('staff.destroy',$mem->id)}}" method="post"
                                              onsubmit="return confirm('Are you sure')">
                                            @csrf
                                            <input type="hidden" name="_method" value="Delete">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o fa-fw"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
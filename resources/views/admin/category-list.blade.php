@extends ('layouts.app')
@section('title','Category list')
@section('page-name','Category list')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class=" panel-heading">
                    All Category
                    <a href="{{route("category.create")}}" class="btn btn-primary pull-right btm-sm" role="button" style="margin: -7px">Category</a>
                </div>
                <div class="panel-body" id="sortable">
                    @if(asset($category) && is_object($category))
                        <table class="table striped table-bordered table-hover" id="dataTables-example"
                               style="width: 100% ">
                            <thead>
                            <tr>
                                <th>
                                    id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Created_at
                                </th>
                                <th>
                                    Updated_at
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
                            @foreach($category as $cat)
                                <tr class="odd gradeX ">
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->created_at}}</td>
                                    <td>{{$cat->updated_at}}</td>
                                    <td><a href="{{route('category.edit',$cat->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit fa-fw"></i></a></td>
                                    <td>
                                        <form action="{{route('category.destroy',$cat->id)}}" method="post"
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
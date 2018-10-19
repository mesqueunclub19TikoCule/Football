@extends ('layouts.app')
@section('title','product list')
@section('page-name','Product list')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class=" panel-heading">
                    All Products
                    <a href="{{route("product.create")}}" class="btn btn-primary pull-right btm-sm" role="button" style="margin: -7px">Product</a>
                </div>
                <div class="panel-body" id="sortable">
                    @if(asset($product) && is_object($product))
                        <table class="table striped table-bordered table-hover" id="dataTables-example"
                               style="width: 100% ">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Price</th>
                                <th>Role</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
                            </tr>

                            </thead>

                            <tbody>
                            @foreach($product as $prod)
                                <tr class="odd gradeX ">
                                    <td>{{$prod->name}}</td>
                                    <td>{{$prod->desc}}</td>
                                    <td>{{$prod->price}}</td>
                                    <td>{{$prod->role}}</td>
                                    <td>{{$prod->category->name}}</td>
                                    <td><a href="{{route('product.edit',$prod->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit fa-fw"></i></a></td>
                                    <td>
                                        <form action="{{route('product.destroy',$prod->id)}}" method="post"
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
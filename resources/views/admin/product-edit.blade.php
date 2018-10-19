@extends("layouts.app")
@section("title","Edit Product")
@section("page","Edit Product")
@section("content")
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            @if(isset($product) && is_object($product))
                <form action="{{ route('product.update', $product->id) }}" method="post" role="form"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$product->name}}" id="name" class="form-control"
                               placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input type="text" name="desc" value="{{$product->desc}}" id="desc" class="form-control"
                               placeholder="Enter Description">
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="number" name="price" id="price" value="{{$product->price}}" class="form-control"
                               placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        @if($product->role == 0)
                            <label>Ordinary</label>
                            <input type="radio" name="role" value="0" checked>
                            <label>Special</label>
                            <input type="radio" name="role" value="1">
                        @else
                            <label>Ordinary</label>
                            <input type="radio" name="role" value="0">
                            <label>Special</label>
                            <input type="radio" name="role" value="1" checked>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="desc">Category</label>
                        <select name="category_id" class="form-control" id="sel1">
                            @foreach($category as $cat)
                                @if($cat->id == $product->category_id)
                                    <option value="{{$cat->id}}" selected>  {{$cat->name}}  </option>
                                @else
                                    <option value="{{$cat->id}}">  {{$cat->name}}  </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Edit product</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
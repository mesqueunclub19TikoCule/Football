@extends('layouts.app')

@section('title','Add Product')

@section('page-name','Add Product')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('product.store') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" name="desc" value="{{ old('desc') }}" id="desc" class="form-control" placeholder="Enter Description">
                </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" class="form-control" placeholder="Enter Price" >
                </div>
                <div class="form-group">
                    <label >Ordinary</label>
                    <input type="radio" name="role" value="0">
                    <label >Special</label>
                    <input type="radio" name="role" value="1">
                </div>
                <div class="form-group">
                    <label for="desc">Category</label>
                    <select name="category_id" class="form-control" id="sel1">
                        @foreach($category as $cat)
                            <option  value="{{$cat->id}}">  {{$cat->name}}  </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection
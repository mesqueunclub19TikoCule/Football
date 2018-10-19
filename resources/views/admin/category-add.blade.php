@extends ('layouts.app')
@section('title','Add Category')
@section('page-name','Category list')

@section("content")

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('category.store') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">First name</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="first_name" class="form-control" placeholder="Enter category name">
                </div>
                <br>
                <br>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add category</button>
                </div>
            </form>
        </div>
    </div>

@endsection
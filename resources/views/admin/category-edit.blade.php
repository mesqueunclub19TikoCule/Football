@extends('layouts.app')

@section('title','Edit Category')

@section('page-name','Edit Category')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            @if(isset($cat) && is_object($cat))
                <form action="{{ route('category.update', $cat->id) }}" method="post" role="form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $cat->name }}" id="name" class="form-control">
                    </div>

                    <br>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Edit category </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection
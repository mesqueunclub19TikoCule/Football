@extends('layouts.app')

@section('title','Edit Staff')

@section('page-name','Edit Staff')
@section('content')
<div class="row">
       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
@if(isset($member) && is_object($member))
    <form action="{{ route('staff.update', $member->id) }}" method="post" role="form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="name">First name</label>
            <input type="text" name="name" value="{{ $member->name }}" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="surname">Last name</label>
            <input type="text" name="surname" value="{{ $member->surname }}" id="surname" class="form-control" >
        </div>
        <div class="form-group">
            <label for="new_img">Avatar</label>
            <input type="file" name="new_img" id="new_img" class="filestyle" data-buttonBefore="true" data-buttonName="btn-primary">
        </div>
        <div class="form-group">
            <label>Old avatar</label> <br>
            <img src="{{ asset('images') . '/' . $member->img }}" alt="{{ $member->img }}" width="150">
            <input type="hidden" name="img" value="{{ $member->img }}">
        </div>
        <div class="form-group">
            <label for="prof">Profession</label>
            <input type="text" name="prof" value="{{ $member->prof }}" id="prof" class="form-control">
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <input type="text" name="desc" value="{{ $member->desc }}" id="desc" class="form-control">
        </div>
        <br>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Edit staff member</button>
        </div>
    </form>
    @endif
    </div>
    </div>
@endsection
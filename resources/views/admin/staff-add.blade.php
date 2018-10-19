@extends("layouts.app")
@section("title","Add Staff")
@section("page","Add Staff")
@section("content")

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="{{ route('staff.store') }}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">First name</label>
                    <input type="text" name="name" value="{{ old('name') }}" id="first_name" class="form-control" placeholder="Enter first name">
                </div>
                <div class="form-group">
                    <label for="surname">Last name</label>
                    <input type="text" name="surname" value="{{ old('surname') }}" id="last_name" class="form-control" placeholder="Enter last name">
                </div>
                <div class="form-group">
                    <label for="img">Avatar</label>
                    <input type="file" name="img" id="avatar" class="filestyle" data-buttonBefore="true" data-buttonName="btn-primary">
                </div>
                <div class="form-group">
                    <label for="profn">Profession</label>
                    <input type="text" name="prof" id="profession" class="form-control" placeholder="Enter profession">
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" name="desc" id="profession" class="form-control" placeholder="Enter profession">
                </div>
                <br>
                <br>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save team member</button>
                </div>
            </form>
        </div>
    </div>

@endsection


@extends('layouts.app')

@section('content')
    <div class="container">

        @include('admin.include.error');

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit User Profile</div>

                    <div class="panel-body">
                        <form action="{{route('user.profile.update')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">User Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">User Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" value="{{$user->email}}" id="email" placeholder="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">User Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="avatar" class="col-sm-3 control-label">User avatar</label>
                                <div class="col-sm-9">
                                    <input type="file" name="avatar" class="form-control" id="avatar" placeholder="avatar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="facebook" class="col-sm-3 control-label">Facebook Profile</label>
                                <div class="col-sm-9">
                                    <input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}" id="facebook" placeholder="facebook">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="youtube" class="col-sm-3 control-label">YouTube Profile</label>
                                <div class="col-sm-9">
                                    <input type="text" name="youtube" class="form-control" value="{{$user->profile->youtube}}" id="youtube" placeholder="youtube">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="about" class="col-sm-3 control-label">User About</label>
                                <div class="col-sm-9">
                                    <textarea type="text" rows="3" name="about" class="form-control" id="about" placeholder="about">{{$user->profile->about}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">

        @include('admin.include.error');

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New User</div>

                    <div class="panel-body">
                        <form action="{{route('user.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">User Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">User Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">

        @include('admin.include.error');

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Tag</div>

                    <div class="panel-body">
                        <form action="{{route('tag.store')}}" method="POST" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="tagName" class="col-sm-3 control-label">Tag name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tagName" class="form-control" id="tagName" placeholder="TAG Name">
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

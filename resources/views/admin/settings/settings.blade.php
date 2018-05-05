@extends('layouts.app')

@section('content')
    <div class="container">

        @include('admin.include.error');

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit settings</div>

                    <div class="panel-body">
                        <form action="{{route('setting.update')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Site Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}" id="site_name" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control" value="{{$setting->address}}"id="address" placeholder="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact_number" class="col-sm-3 control-label">contact number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="contact_number" class="form-control" value="{{$setting->contact_number}}"id="contact_number" placeholder="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact_email" class="col-sm-3 control-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="email" name="contact_email" class="form-control" value="{{$setting->contact_email}}"id="contact_email" placeholder="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success">update site setting</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">

        @include('admin.include.error');

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Post</div>

                    <div class="panel-body">
                        <form action="{{route('post.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Post Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="Post Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Category name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category_id">
                                        @foreach($category as $aCategory)
                                            <option value="{{$aCategory->id}}">{{$aCategory->categoryName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Select Tag</label>
                                <div class="col-sm-9">
                                    <div class="checkbox">
                                        @foreach($tags as $aTag)
                                            <label>
                                                <input type="checkbox" name="tags[]" value="{{$aTag->id}}"> {{$aTag->tag}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Post Description</label>
                                <div class="col-sm-9">
                                    <textarea name="contant" class="form-control" rows="10" id="summernote" placeholder="Post description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Feature Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="featured" class="form-control" id="featured">
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

@section('style')



@stop

@section('script')


@stop


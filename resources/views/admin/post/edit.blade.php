@extends('layouts.app')

@section('content')
    <div class="container">

        @include('admin.include.error');

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Post</div>

                    <div class="panel-body">
                        <form action="{{route('post.update', ['id' => $post->id ])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Post Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" id="inputEmail3" value="{{$post->title}}" placeholder="Post Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Category name</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $aCategory)
                                            <option value="{{$aCategory->id}}"
                                                @if($post->category->id == $aCategory->id)
                                                    selected
                                                @endif
                                            >{{$aCategory->categoryName}}</option>
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
                                                <input type="checkbox" name="tags[]" value="{{$aTag->id}}"
                                                @foreach($post->tags as $aT)
                                                    @if($aTag->id == $aT->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                                > {{$aTag->tag}}
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Post Description</label>
                                <div class="col-sm-9">
                                    <textarea name="contant" class="form-control" rows="5" id="contant" placeholder="Post description">{{$post->contant}}</textarea>
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
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

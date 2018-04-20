@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <th>post Image</th>
                    <th>post title</th>
                    <th>post Content</th>
                    <th>Editing Post</th>
                    <th>Deleting Post</th>
                    </thead>
                    <tbody>
                    @foreach($posts as $aPost)
                        <tr>
                            <td><img src="{{asset($aPost->featured)}}" title="Image" width="100" height="80"> </td>
                            <td>{{$aPost->title}}</td>
                            <td>{{$aPost->contant}}</td>
                            <td><a class="btn btn-primary" href="{{route('post.edit', ['id' => $aPost->id])}}"> Edit Post</a></td>
                            <td><a class="btn btn-danger" href="{{route('post.delete', ['id' => $aPost->id])}}"> Delete Post </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
@endsection
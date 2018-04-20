@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($users->count() > 0)
                <table class="table table-hover">
                    <thead>
                    <th>post Image</th>
                    <th>Name</th>
                    <th>Permission</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><img src="{{asset($user->profile->avatar)}}" title="Image" height="100" style="border-radius: 50%;"> </td>
                            <td>{{$user->name}}</td>
                            <td>
                                @if($user->admin)
                                   Admin (<a href="{{route('user.not.admin', ['id' =>$user->id])}}" class="btn btn-default">Make Not Admin</a>)
                                @else
                                    <a href="{{route('user.admin', ['id' =>$user->id])}}" class="btn btn-default">Make Admin</a>
                                @endif

                            </td>
                            <td><a class="btn btn-primary" href="{{route('post.edit', ['id' => $user->id])}}"> Edit Post</a></td>


                                <td>
                                    @if(Auth::Id() != $user->id)
                                        <a class="btn btn-danger" href="{{route('user.delete', ['id' => $user->id])}}"> Delete Post </a>
                                    @else
                                        Cannot Delete.
                                    @endif
                                </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    @else
                    <h1>no data</h1>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($tags->count() >0)
                <table class="table table-hover">
                    <thead>
                    <th>tag name</th>
                    <th>Editing tab</th>
                    <th>Deleting tag</th>
                    </thead>
                    <tbody>
                    @foreach($tags as $aTag)
                        <tr>
                            <td>{{$aTag->tag}}</td>
                            <td><a class="btn btn-primary" href="{{route('tag.edit', ['id' => $aTag->id])}}"> Edit tag</a></td>
                            <td><a class="btn btn-danger" href="{{route('tag.delete', ['id' => $aTag->id])}}"> Delete tag </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    <h4>No Tags found.</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
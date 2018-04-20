@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <th>Category name</th>
                        <th>Editing Category</th>
                        <th>Deleting Category</th>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->categoryName}}</td>
                                <td><a class="btn btn-primary" href="{{route('category.edit', ['id' => $category->id])}}"> Edit Category</a></td>
                                <td><a class="btn btn-danger" href="{{route('category.delete', ['id' => $category->id])}}"> Delete Category </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
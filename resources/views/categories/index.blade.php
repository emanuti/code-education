@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categories</h1>
    <a href="{{ route('category.create') }}" class="btn btn-primary">Add</a>
    <br/>
    <br/>
    <table class="table table-striped">
        <thead class="thead-light">
        <tr>
            <th></th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <thead>
        <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td class="col-md-3">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-sm">Edit</a>
                    </div>
                    <div class="col-md-2">
                    <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm">Del</button>
                    </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
        <tbody>
    </table>
</div>
@endsection
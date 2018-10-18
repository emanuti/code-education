@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add category</h1>

    <a href="{{ route('category.index') }}" class="btn">All categories</a>
    
    <ul>
        @foreach ($errors->all() as $erro)
        <li>{{ $erro }}</li>    
        @endforeach
    </ul>
    
    <form action="{{ route('category.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editing category: {{ $category->name }}</h1>

    <a href="{{ route('category.index') }}" class="btn">All categories</a>
    
    <ul>
        @foreach ($errors->all() as $erro)
        <li>{{ $erro }}</li>    
        @endforeach
    </ul>
    
    <form action="{{ route('category.update', $category->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" rows="10">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection

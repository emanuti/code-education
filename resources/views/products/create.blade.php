@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Category</h1>

    <a href="{{ route('product.index') }}" class="btn">All products</a>
    <br/>
    <br/>

    <ul>
        @foreach ($errors->all() as $erro)
        <li>{{ $erro }}</li>    
        @endforeach
    </ul>

    <form action="{{ route('product.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control">
                <option></option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="featured">Featured:</label>
            <input type="text" name="featured" class="form-control">
        </div>
        <div class="form-group">
            <label for="recommended">Recommended:</label>
            <input type="text" name="recommended" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
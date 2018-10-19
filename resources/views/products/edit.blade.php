@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editing {{ $product->name }} product</h1>

    <a href="{{ route('product.index') }}" class="btn">All products</a>

    <ul class="bg-danger">
        @foreach ($errors->all() as $erro)
            {{ $erro }}
        @endforeach
    </ul>

    <form action="{{ route('product.update', $product->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category->id == $category->id ? 'checked="checked"':'' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name"></label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="description"></label>
            <input type="text" name="description" class="form-control" value="{{ $product->description }}">
        </div>
        <div class="form-group">
            <label for="price"></label>
            <input type="text" name="price" class="form-control" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="featured"></label>
            <input type="text" name="featured" class="form-control" value="{{ $product->featured }}">
        </div>
        <div class="form-group">
            <label for="recommended"></label>
            <input type="text" name="recommended" class="form-control" value="{{ $product->recommended }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</div>
@endsection
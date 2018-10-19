@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>

    <a href="{{ route('product.create') }}" class="btn btn-primary">Add</a>
    <br/>
    <br/>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Featured</th>
                <th>Recommended</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->featured }}</td>
                <td>{{ $product->recommended }}</td>
                <td class="col-md-3">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ route('product.images.index', $product->id) }}" class="btn btn-sm">Images</a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm">Edit</a>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{ $products->render() }}
</div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $product->name }} images</h1>
        <a href="{{ route('product.images.create', $product->id )}}">New Image</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Extension</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($product->images as $image)
            <tr>
                <td>{{ $image->id }}</td>
                <td>.{{ $image->extension }}</td>
                <td><img src="{{ url('uploads/' . $image->id .'.'. $image->extension) }}" width="35"/></td>
                <td class="col-md-3">
                    <div class="row">
                        {{-- <div class="col-md-2">
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm">Edit</a>
                        </div> --}}
                        <div class="col-md-2">
                            <form action="{{ route('product.images.destroy', $image->id) }}" method="POST">
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
        <a href="{{ route('product.index') }}" class="btn">All Products</a>
    </div>
@endsection
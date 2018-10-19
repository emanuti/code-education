@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upload <b>{{ $product->name }}</b> Image</h1>

    <ul class="bg-danger">
        @foreach ($errors->all() as $erro)
            {{ $erro }}
        @endforeach
    </ul>

    <a href="{{ route('product.images.index', $product->id) }}">All Product images</a>
    <br/>
    <br/>
    <form action="{{ route('product.images.store', $product->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="">File</label>
            <input type="file" name="product_image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload File</button>
    </form>
</div>
@endsection
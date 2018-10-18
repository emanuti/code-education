<h1>Editing category: {{ $category->name }}</h1>

<a href="{{ route('category.index') }}">All categories</a>

<ul>
    @foreach ($errors->all() as $erro)
    <li>{{ $erro }}</li>    
    @endforeach
</ul>

<form action="{{ route('category.update', $category->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-control">
        <label for="name">Name: </label>
        <input type="text" name="name" value="{{ $category->name }}">
    </div>
    <div class="form-control">
        <label for="description">Description:</label>
        <textarea name="description" cols="30" rows="10">{{ $category->description }}</textarea>
    </div>
    <button type="submit">Edit</button>
</form>
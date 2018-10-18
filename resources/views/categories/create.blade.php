<h1>Add category</h1>

<a href="{{ route('category.index') }}">All categories</a>

<ul>
    @foreach ($errors->all() as $erro)
    <li>{{ $erro }}</li>    
    @endforeach
</ul>

<form action="{{ route('category.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-control">
        <label for="name">Name: </label>
        <input type="text" name="name">
    </div>
    <div class="form-control">
        <label for="description">Description:</label>
        <textarea name="description" cols="30" rows="10"></textarea>
    </div>
    <button type="submit">Add</button>
</form>
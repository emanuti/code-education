<h1>Categories</h1>
<a href="{{ route('category.create') }}">Add</a>
<div class="content">
    <table class="table">
        <tr>
            <th></th>
            <th>Name</th>
            <th>Description</th>
        </tr>

        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="{{ route('category.edit', ['id' => $category->id]) }}">Edit</a> |
                <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit">Del</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>

<table border="1">
    <tr>
        <td>ID</td>
        <td>NAME</td>
        <td>SLUG</td>
        <td>EDIT</td>
        <td>DELETE</td>
    </tr>
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id}}</td>
            <td>{{ $category->name}}</td>
            <td>{{ $category->slug}}</td>
            <td><a href="#">EDIT</a></td>
            <td>DELETE</td>
        </tr>
    @endforeach
</table>

{{$categories}}





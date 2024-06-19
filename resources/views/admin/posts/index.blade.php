<h1>Tableau de Bord</h1>
<div>
    Bienvenue, {{ Auth::user()->name }}!
</div>

<div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
</div>
<table border="1">
    <tr>
        <td>ID</td>
        <td>TITLE</td>
        <td>USER</td>
        <td>EDIT</td>
        <td>DELETE</td>
    </tr>
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id}}</td>
            <td>{{ $post->title}}</td>
            <td>
                {{ $post->user->role->name}}/
                {{$post->user->name}}/
                {{$post->user->profile->website}}
            </td>
            <td><a href="#">EDIT</a></td>
            <td>DELETE</td>
        </tr>
    @endforeach
</table>

{{}}





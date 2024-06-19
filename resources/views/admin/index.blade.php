
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

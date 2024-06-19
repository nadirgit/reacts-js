<!-- resources/views/auth/login.blade.php -->
<form method="POST" action="{{ route('login') }}">
    @csrf  <!-- Token CSRF pour sécuriser le formulaire -->

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <button type="submit">Se connecter</button>
    </div>
</form>

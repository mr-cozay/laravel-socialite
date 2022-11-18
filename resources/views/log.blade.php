<form action="/login" method="post">
    @csrf
    Email: <input type="text" name="email" id="email">
    Mot de passe: <input type="password" name="password" id="password">
    <button type="submit">
        Connexion
    </button>
</form>
@if ($errors->any())
@foreach ($errors->all() as $error)
<li>{{ $error}}</li>
@endforeach

@endif

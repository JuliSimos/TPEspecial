<form action="{BASE_URL}login/verificar" method="post">
    <label for="nombre">User</label>
    <input type="text" name="nombreUser" placeholder="Nombre"/>

    <label for="password">Contraseña</label>
    <input type="password" name="password" placeholder="Contraseña"/>

    <button class= 'btn' type="submit">Entrar</button>
</form>
{if $error}
    <p>{$error}</p>
{/if}
<p>Editando: {$genero->genero}</p>

<form action="{BASE_URL}panel/genero/editar/{$genero->id}" method="post">
<label for="nombre">Nuevo genero</label>
    <input type="text" name="genero" placeholder="tipo de genero"/>

    <button type="submit">Enviar</button>
</form>
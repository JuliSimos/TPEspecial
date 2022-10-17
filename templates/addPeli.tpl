<form action="{BASE_URL}panel/pelicula/agregar" method="post">
<label for="nombre">Nombre de pelicula</label>
    <input type="text" name="nombre" placeholder="nombre de pelicula"/>

    <label for="sinopsis">Sinopsis</label>
    <input type="text" name="sinopsis" placeholder="sinopsis"/>

    <label for="fecha">Fecha</label>
    <input type="text" name="fecha" placeholder="Fecha"/>

    <label for="pais">Pais</label>
    <input type="text" name="pais" placeholder="Pais"/>

    <label for="direccion">Direccion</label>
    <input type="text" name="direccion" placeholder="Director/a"/>

    <label for="genero">Genero</label>
    <select name='genero'>
        {foreach from=$generos item=$elem}
            <option value='{$elem->id}'>{$elem->genero}</option>   
        {/foreach}
    </select>

    <button type="submit">Enviar</button>
</form>
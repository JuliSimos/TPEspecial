<table class='table'>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Genero</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$peliculas item=$peli }
                <tr>
                    <td>{$peli->nombre}</td>
                    <td>{$peli->fecha}</td>
                    <td>{$peli->genero|capitalize}</td>
                    <td class="text-center"> <a class='btn' href="{BASE_URL}info/peliculas/{$peli->id}"> + Info </a>
                </tr>
            {/foreach}

        </tbody>
    </table>

    {if $error}
        <p>{$error}</p>
    {/if}
    

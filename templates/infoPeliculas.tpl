{if $error}
    <p>{$error}</p>
{/if}

<table class='table'>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Sinopsis</th>
                <th>Fecha</th>
                <th>Pais</th>
                <th>Direccion</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                {if $pelicula}
                    <td>{$pelicula->nombre}</td>
                    <td>{$pelicula->sinopsis}</td>
                    <td>{$pelicula->fecha}</td>
                    <td>{$pelicula->pais}</td>
                    <td>{$pelicula->direccion}</td>
                    <td>{$pelicula->genero|capitalize}</td>
                {/if}
                </tr>

        </tbody>
    </table>
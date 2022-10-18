<table class='table table-bordered w-75 mx-auto'>
        <thead class="table-dark">
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
                    <td class="text-center "> <a class='btn btn-outline-dark' href="{BASE_URL}info/peliculas/{$peli->id}"> + Info </a>
                     <a class='btn btn-outline-warning ' href="{BASE_URL}panel/pelicula/editar/{$peli->id}"> Editar</a> 
                     <a class='btn btn-outline-danger fw-bold' href="{BASE_URL}panel/pelicula/borrar/{$peli->id}"> Borrar</a> </td>
                </tr>
            {/foreach}

        </tbody>
    </table>
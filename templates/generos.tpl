<table class='table table-bordered w-75 mx-auto border'>
<thead class="table-dark">
    <th>Genero</th>
    <th class='text-center' >Accion</th>
</thead>
<tbody>
    {foreach from=$generos item=$elem }
        <tr>
            <td>{$elem->genero}</td>
            <td class='text-center'> <a class='btn btn-outline-warning' href="{BASE_URL}panel/genero/editar/{$elem->id}"> editar </a>
            <a class='btn btn-outline-danger fw-bold' href="{BASE_URL}panel/genero/borrar/{$elem->id}"> borrar </a></td>

        </tr>
    {/foreach}
</tbody>
</table>
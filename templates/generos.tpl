<table class='table'>
<thead>
    <th>Genero</th>
    <th>Accion</th>
</thead>
<tbody>
    {foreach from=$generos item=$elem }
        <tr>
            <td>{$elem->genero}</td>
            <td> <a class='btn' href="{BASE_URL}panel/genero/editar/{$elem->id}"> editar </a>
            <a class='btn' href="{BASE_URL}panel/genero/borrar/{$elem->id}"> borrar </a></td>

        </tr>
    {/foreach}
</tbody>
</table>
<form action="{BASE_URL}panel/pelicula/editar/{$pelicula->id}"  class="w-75 mx-auto my-5 border border-success rounded p-4" method="post">
<div class="row g-3 py-3 ">
        <div class='col md-2'>
            <label class='form-label fw-bold' for="nombre">Nombre de pelicula</label>
            <input class="form-control" type="text" name="nombre" placeholder="nombre de pelicula"/>
        </div>
        <div class='col md-6'>
            <label class='form-label fw-bold' for="sinopsis">Sinopsis</label>
            <input class="form-control" type="text" name="sinopsis" placeholder="sinopsis"/>
        </div>
        <div class='col md-6'>
            <label class='form-label fw-bold' for="fecha">Fecha</label>
            <input class="form-control" type="number" name="fecha" placeholder="Fecha"/>
        </div>
    </div>
    <div class="row g-3 py-3 ">
        <div class='col md-6'>
            <label class='form-label fw-bold' for="pais">Pais</label>
            <input class="form-control" type="text" name="pais" placeholder="Pais"/>
        </div>
        <div class='col md-6'>
            <label class='form-label fw-bold' for="direccion">Direccion</label>
            <input class="form-control" type="text" name="direccion" placeholder="Director/a"/>
        </div>
    </div>
    <div class='row g-3 py-3 '>
        <div class='col md-12'>
            <label class='form-label fw-bold' for="genero">Genero</label>
            <select class="form-select" name='genero'>
            {foreach from=$generos item=$elem}
                <option value='{$elem->id}'>{$elem->genero}</option>   
            {/foreach}
        </select>
        </div>
    </div>
    <div class='row'>
        <button class='btn btn-success mt-4' type="submit">Enviar</button>
    </div>
</form>
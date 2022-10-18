
<div class='card text-bg-light mb-3 w-50 mx-auto mt-5'>
    <div class='card-header p-3 text-center fw-bold fs-4'>
        <p>EDITANDO: {$genero->genero|capitalize}</p>
    </div>
        <form action="{BASE_URL}panel/genero/editar/{$genero->id}" class='card-body w-75 text-center mx-auto my-5 rounded ' method="post">
            <div class='col md-2'>
                <label class='form-label fw-bold fs-4' for="nombre">Nuevo genero</label>
                <input class="form-control" type="text" name="genero" placeholder="tipo de genero"/>
            </div>
            <div class='col md-2'>
                <button class='btn btn-success mt-4 px-5' type="submit">Enviar</button>
            </div>
        </form>
</div>
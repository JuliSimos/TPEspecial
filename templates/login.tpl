<form action="{BASE_URL}login/verificar"  class="w-50 text-center mx-auto my-5 border border-success rounded p-4" method="post">

        <div class='row'>

            <div class='col md-2'>
                <label class='form-label fw-bold' for="nombre">User</label>
                <input class="form-control" type="text" name="nombreUser" placeholder="Nombre"/>
            </div>
            <div class='col md-2'>
                <label class='form-label fw-bold' for="password">Contraseña</label>
                <input class="form-control" type="password" name="password" placeholder="Contraseña"/>
            </div>
        </div>
            <button class= 'w-50 mx-auto mt-3 btn btn-success' type="submit">Entrar</button>

    </form>
{if $error}
    {include 'error.tpl'}
{/if}
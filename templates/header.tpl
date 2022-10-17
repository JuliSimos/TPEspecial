<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <header>
        <h2>Hola! Soy el header</h2>
        <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{BASE_URL}">HOME</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          {foreach from=$generosHeader item=$elem}
            <li class='nav-item'>
                <a class='nav-link active' href='{BASE_URL}info/generos/{$elem->id}'>{$elem->genero}</a>
            </li>
          {/foreach}
      </ul>
    </div>
    <a class='navbar-brand text-end' href='{BASE_URL}login'>Ingresar</a>
    {if isset($nombreUser)}
      <a class='navbar-brand text-end' href='{BASE_URL}deslogearse'>Cerrar Sesión</a>
      <p class='navbar-brand'>{$nombreUser}</p>
    {/if}
  </div>
</nav>     
    </header>
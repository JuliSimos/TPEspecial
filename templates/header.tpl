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
        <nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold fs-3 text-white" href="{BASE_URL}">HOME</a>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          {foreach from=$generosHeader item=$elem}
            <li>
                <a class='nav-link btn btn-outline-secondary text-white mx-1' href='{BASE_URL}info/generos/{$elem->id}'>{$elem->genero}</a>
            </li>
          {/foreach}
      </ul>
    </div>
    {if isset($nombreUser)}
        <a class='navbar-brand text-end btn btn-danger text-white fs-6' href='{BASE_URL}deslogearse'>Cerrar Sesión</a>
        <p class='navbar-brand text-end align-baseline pt-3 text-white'>{$nombreUser|capitalize}</p>
      {else}
        <a class='navbar-brand text-end text-white btn btn-success' href='{BASE_URL}login'>Ingresar</a>
    {/if}
  </div>
</nav>     
    </header>
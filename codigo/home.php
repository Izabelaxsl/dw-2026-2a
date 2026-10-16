<?php
require_once "verificar_sessao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card shadow border-0 rounded-4 mx-auto p-4" style="max-width: 500px;">

            <h2 class="text-center text-primary mb-2">Página Inicial</h2>
            <p class="text-center text-secondary mb-4">

            </p>

            <label class="form-label fw-bold">Menu principal</label>

            <a href="form_postagem.php"
                class="form-control mb-3 text-decoration-none text-primary">
                Nova postagem
            </a>

            <a href="listar_postagem.php"
                class="form-control mb-3 text-decoration-none text-success">
                Ver postagens
            </a>

            <a href="listagem_usuario.php"
                class="form-control mb-4 text-decoration-none text-dark">
                Usuários cadastrados
            </a>

            <a href="deslogar.php"
                class="btn btn-outline-danger w-100">
                Sair
            </a>

        </div>
    </div>
</body>

</html>
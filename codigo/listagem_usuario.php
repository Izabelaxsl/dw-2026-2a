<?php
require_once "verificar_sessao.php";
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <h2 class="text-center mb-4 fw-bold">
            Lista de Usuários
        </h2>

        <div class="row justify-content-center">

            <?php
            $sql = "SELECT idusuario, nome, foto FROM usuario";
            $resultado = mysqli_query($conexao, $sql);

            while ($usuario = mysqli_fetch_array($resultado)) {

                if ($usuario['idusuario'] != $_SESSION['idusuario']) {

                    $idusuario_seguir = (int) $usuario['idusuario'];
                    $nome = htmlspecialchars($usuario['nome'], ENT_QUOTES, 'UTF-8');
                    $foto = htmlspecialchars($usuario['foto'] ?? '', ENT_QUOTES, 'UTF-8');

                    $id_logado = (int) $_SESSION['idusuario'];

                    $validacao = mysqli_query(
                        $conexao,
                        "SELECT * FROM seguir
                         WHERE idseguidor = $id_logado
                         AND idseguindo = $idusuario_seguir"
                    );

                    $seguindo = mysqli_num_rows($validacao) > 0;

                    $validacao_volta = mysqli_query($conexao, "SELECT * FROM seguir WHERE idseguidor = $idusuario_seguir AND idseguindo = $id_logado ");

                    $segue_de_volta = mysqli_num_rows($validacao_volta) > 0;
            ?>

                    <div class="col-12 col-md-6 col-lg-4 mb-3" id="usuario<?= $idusuario_seguir ?>">

                        <div class="card shadow-sm border-0 rounded-4 p-3">

                            <div class="clearfix">

                                <img
                                    src="<?= $foto ?>"
                                    alt="Foto de <?= $nome ?>"
                                    class="rounded-circle float-start me-3"
                                    width="65"
                                    height="65"
                                    style="object-fit: cover;">

                                <div class="pt-1">
                                    <h5 class="fw-bold mb-2">
                                        <?= $nome ?>
                                    </h5>

                                    <?php if ($seguindo) { ?>

                                        <a
                                            href="excluir_seguidor.php?id=<?= $idusuario_seguir ?>"
                                            class="btn btn-outline-danger btn-sm">
                                            Deixar de seguir
                                        </a>

                                    <?php } else { ?>

                                        <?php if ($segue_de_volta) { ?>

                                            <a href="salvar_seguir.php?id=<?= $idusuario_seguir ?>"
                                                class="btn btn-primary btn-sm">
                                                Seguir de volta
                                            </a>

                                        <?php } else { ?>

                                            <a
                                                href="salvar_seguir.php?id=<?= $idusuario_seguir ?>"
                                                class="btn btn-primary btn-sm">
                                                Seguir
                                            </a>

                                        <?php } ?>

                                    <?php } ?>
                                </div>

                            </div>

                        </div>

                    </div>

            <?php
                }
            }
            ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
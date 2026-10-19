<?php
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Listar Postagens</title>

    <link rel="stylesheet" href="estilo.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .postagens {
            max-width: 750px;
            margin: 30px auto;
        }

        .postagem {
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 12px;
            margin-bottom: 25px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .postagem-cabecalho {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            background-color: #e7f1ff;
        }

        .foto-usuario {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }

        .nome-usuario {
            font-weight: bold;
            margin: 0;
        }

        .data-postagem {
            font-size: 12px;
            color: #6c757d;
        }

        .texto-postagem {
            padding: 20px;
            overflow-wrap: anywhere;
            white-space: pre-wrap;
        }

        .comentarios {
            background-color: #f8f9fa;
            padding: 15px;
            border-top: 1px solid #dee2e6;
        }

        .comentario {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background-color: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .foto-comentario {
            width: 35px;
            height: 35px;
            object-fit: cover;
            border-radius: 50%;
        }

        .texto-comentario {
            margin: 0;
            overflow-wrap: anywhere;
        }

        .form-comentario {
            display: flex;
            gap: 8px;
            margin-top: 15px;
        }

        .form-comentario input[type="text"] {
            flex: 1;
            min-width: 0;
        }
    </style>
</head>

<body>

    <main class="container py-4">

        <h2 class="text-center fw-bold mb-4">
            Lista de Postagens
        </h2>

        <div class="postagens">

            <?php
            $sql = "SELECT postagem.idpostagem,
                           postagem.texto,
                           postagem.data_hora,
                           usuario.idusuario,
                           usuario.nome,
                           usuario.apelido,
                           usuario.foto
                    FROM postagem
                    INNER JOIN usuario
                    ON postagem.idusuario = usuario.idusuario
                    ORDER BY postagem.data_hora DESC";

            $resultados = mysqli_query($conexao, $sql);

            while ($linha = mysqli_fetch_array($resultados)) {

                $idpostagem = (int) $linha['idpostagem'];
                $idusuario = (int) $linha['idusuario'];

                $texto = htmlspecialchars(
                    $linha['texto'],
                    ENT_QUOTES,
                    'UTF-8'
                );

                $nome = htmlspecialchars(
                    $linha['nome'],
                    ENT_QUOTES,
                    'UTF-8'
                );

                $apelido = htmlspecialchars(
                    $linha['apelido'] ?? '',
                    ENT_QUOTES,
                    'UTF-8'
                );

                $foto = htmlspecialchars(
                    $linha['foto'] ?? '',
                    ENT_QUOTES,
                    'UTF-8'
                );

                $data_hora = htmlspecialchars(
                    $linha['data_hora'],
                    ENT_QUOTES,
                    'UTF-8'
                );

                echo "<article class='postagem'>";

                // Cabeçalho da postagem
                echo "<div class='postagem-cabecalho'>";

                echo "<img class='foto-usuario'
                           src='imagem_usuario/$foto'
                           alt='Foto de $nome'>";

                echo "<div>";
                echo "<p class='nome-usuario'>$nome</p>";

                if ($apelido !== '') {
                    echo "<small class='text-muted'>@$apelido</small><br>";
                }

                echo "<small class='data-postagem'>$data_hora</small>";
                echo "</div>";

                echo "</div>";

                // Texto da postagem
                echo "<div class='texto-postagem'>$texto</div>";

                // Área dos comentários
                echo "<div class='comentarios'>";
                echo "<h6 class='fw-bold mb-3'>Comentários</h6>";

                $sql3 = "SELECT comentario.idcomentario,
                                comentario.idpostagem,
                                comentario.texto,
                                usuario.idusuario,
                                usuario.nome,
                                usuario.apelido,
                                usuario.foto
                         FROM comentario
                         INNER JOIN usuario
                         ON comentario.idusuario = usuario.idusuario
                         WHERE comentario.idpostagem = $idpostagem
                         ORDER BY comentario.idcomentario ASC";

                $comentarios = mysqli_query($conexao, $sql3);

                if (mysqli_num_rows($comentarios) == 0) {

                    echo "<p class='text-muted small'>
                            Essa postagem não possui comentários.
                          </p>";
                } else {

                    while ($comentario = mysqli_fetch_array($comentarios)) {

                        $nome_comentario = htmlspecialchars(
                            $comentario['nome'],
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        $texto_comentario = htmlspecialchars(
                            $comentario['texto'],
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        $foto_comentario = htmlspecialchars(
                            $comentario['foto'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        echo "<div class='comentario'>";

                        echo "<img
                                class='foto-comentario'
                                src='imagem_usuario/$foto_comentario'
                                alt='Foto de $nome_comentario'>";

                        echo "<div>";
                        echo "<strong class='small'>$nome_comentario</strong>";
                        echo "<p class='texto-comentario'>$texto_comentario</p>";
                        echo "</div>";

                        echo "</div>";
                    }
                }

                // Formulário para comentar
                echo "<form
                        action='salvar_comentario.php'
                        method='POST'
                        class='form-comentario'>";

                echo "<input
                        type='hidden'
                        name='idpostagem'
                        value='$idpostagem'>";

                echo "<input
                        type='text'
                        name='texto'
                        class='form-control'
                        placeholder='Escreva um comentário...'
                        required>";

                echo "<button
                        type='submit'
                        class='btn btn-primary'>
                        Comentar
                      </button>";

                echo "</form>";

                echo "</div>";
                echo "</article>";
            }
            ?>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
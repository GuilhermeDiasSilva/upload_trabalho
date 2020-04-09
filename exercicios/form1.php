<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <form class="container" name="form1" method="post" action="ex1.php" enctype="multipart/form-data">
        <!-- enctype="multipart/form-data para que eu possa subir arquivos ao invés de somente texto -->
        <h1>Formulario</h1>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" class="form-control" requiered>

        <label for="arquivo">Arquivo:</label>
        <input type="file" name="arquivo" class="form-control" required accept=".jpg,.jpeg,.png">

        <button type="submit" class="btn btn-success mt-2">Enviar Dados</button>

    </form>
    <h2 class="text-center">Imagens Cadastradas:</h2>
    <div class="container">
        <div class="row">
            <?php
            include "conexao.php";

            $sql = "SELECT descricao, arquivo FROM arquivos";
            $consulta = $pdo->prepare($sql);
            $consulta->execute();

            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)) {
                //separar os dados
                $descricao = $dados->descricao;
                $arquivo    = $dados->arquivo;

                $arquivog = 'arquivos/' . $arquivo . 'g.jpg';
                $arquivop = 'arquivos/' . $arquivo . 'p.jpg';

                echo '<div class="col-4">
                    <a href="' . $arquivog . '">
                    <img src="' . $arquivop . '" alt="' . $descricao . '"
                    title="' . $descricao . '" class="w-100"
                    </a>
                </div>';
            }
            ?>
        </div>
    </div>
</body>

</html>
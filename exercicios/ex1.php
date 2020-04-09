<?php
    
    include "conexao.php";

    // $descricao = "";

    // if (isset ($_POST["descricao"])){
    //     $descricao = $_POST["descricao"];
    // }

 //operadores ternários
 //vou passar pra ver se a condiçao se é verdadeira e se é falsa
//isset ($_POST["descricao"]) ? $descricao = $_POST ["descricao"]:$descricao = $_GET["descricao"];

//operador null coalese
$descricao = $_POST["descricao"] ?? "";
    
    if (empty($descricao)){
    echo '<script>alert("Preencha o campo descrição");history.back();</script> ';
    exit;
}

//print_r ($_FILES);
//para nao sobrepor os arquivos
echo $arquivo = time();

$tipo = pathinfo($_FILES["arquivo"]["name"], PATHINFO_EXTENSION);

$arquivo = $arquivo.".".$tipo;



if ($_FILES["arquivo"]["type"] != "image/jpeg"){
    echo '<script>alert("Não é um arquivo JPG válido");history.back();</script>';
    exit;
} else if (!move_uploaded_file($_FILES["arquivo"]["tmp_name"], "arquivos/".$_FILES["arquivo"]["name"])){
    echo '<script>alert("Erro não foi possível copiar");history.back();</script>';
    exit;

} 
include "imagem.php";

LoadImg("arquivos/".$_FILES["arquivo"]["name"], $arquivo,"arquivos/");

$sql = "INSERT INTO arquivos (descricao, arquivo) VALUES (? , ?)";
$consulta = $pdo->prepare($sql);
$consulta->bindParam(1, $descricao);
$consulta->bindParam(2, $arquivo);

if (!$consulta->execute()){
    echo '<script>alert("Não foi possivel gravar no banco de dados");history.back();</script>';
    exit;
}

echo '<script>alert("Arquivo enviado");history.back();</script>';
exit;

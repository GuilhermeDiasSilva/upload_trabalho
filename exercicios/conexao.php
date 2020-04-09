<?php
  $servidor    = 'localhost';
  $banco       = 'upload';
  $usuario     = 'root';
  $senha       = '';

  //conexao 
  try {
      $pdo = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);
  } catch (PDOException $e){
      echo 'Erro de Conexão' . $e->getMessage();
      exit;
  }
<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "api";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
$conn->set_charset("utf8");
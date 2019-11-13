<?php
include_once("config.php");
  $id = NULL;
  $nome=$_GET["nome"];
  $conteudo=$_GET["conteudo"];
  $data=$_GET["data"];
if (!$strcon) {
 die('Não foi possível conectar ao Banco de Dados');
}
$sql = "INSERT INTO contatos VALUES ";
$sql .= "('$id', '$nome', '$conteudo', '$data')"; 
mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
mysqli_close($strcon);
echo "Contato cadastrado com sucesso!<br>";
?>
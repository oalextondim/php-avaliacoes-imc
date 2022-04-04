<?php 
$conexao = mysqli_connect("localhost", "root", "", "imc");
if (!$conexao) {
  die('Não foi possível conectar: ' . mysql_error());
}
echo 'Conexão bem sucedida';
//  mysql_close($conexao);
?>
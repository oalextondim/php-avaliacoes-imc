<?php 
include('include/connection.php'); 

   
   $sql = "DELETE FROM alunos where id ='".($_GET["id"])."'";

    
   $result = mysqli_query($conexao, $sql) or die(mysql_error());

?>



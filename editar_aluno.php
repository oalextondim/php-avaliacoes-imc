

<?php include('header.php'); ?>

<?php include('include/connection.php'); ?>
<section>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Seminário</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="./">Geral</a></li>
            <li class="active"><a href="cadastro_aluno.php">Cadastro de Aluno</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Editar de Aluno</h1>
      
      </div>
      <?php 
        $listar_alunos_sql = "select * from alunos where ID = ".$_GET['id']."";
      
        $result = mysqli_query($conexao, $listar_alunos_sql) or die(mysql_error()); 

     
      
             while(  $rows =  mysqli_fetch_assoc($result)){
             ?>
      <form class="form-horizontal" action="?id=<?php echo ($_GET['id']); ?>&save" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="nome">Nome:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nome" value="<?php echo ($rows['nome']); ?>" name="nome">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="cpf">CPF:</label>
      <div class="col-sm-10">
        <input type="text"   maxlength="18" onkeydown="javascript: fMasc( this, mCPF );" class="form-control" id="cpf"  value="<?php echo ($rows['cpf']); ?>"  name="cpf">
 
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="idade">Idade:</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="idade" value="<?php echo ($rows['idade']); ?>" name="idade">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="serie">Série:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="serie"  value="<?php echo ($rows['serie']); ?>"  name="serie">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="turma">Turma:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="turma"  value="<?php echo ($rows['turma']); ?>"  name="turma">

        <input type="hidden" class="form-control" id="id"  value="<?php echo ($rows['id']); ?>"  name="id">
      </div>
    </div>
 
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Salvar</button>
      </div>
    </div>
  </form>
  <?php
             }
           
             ?>
	
    </div><!-- /.container -->
</section>

<script>


function fMasc(objeto,mascara) {
obj=objeto
masc=mascara
setTimeout("fMascEx()",1)
}

function fMascEx() {
obj.value=masc(obj.value)
}

function mCPF(cpf){
cpf=cpf.replace(/\D/g,"")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
return cpf
}


</script>

<?php if(isset($_POST) and isset($_GET["save"])){
  
   
   $sql = "UPDATE alunos SET nome ='".($_POST["nome"])."',
   idade ='".$_POST["idade"]."',
   turma ='".$_POST["turma"]."',
   serie ='".$_POST["serie"]."',
   cpf ='".$_POST["cpf"]."'
    where id =".$_POST["id"];

    
   $result = mysqli_query($conexao, $sql) or die(mysql_error());
   $id_aluno = $_POST["id"];
   echo("<script>alert('Registro Atualizado')</script>");
   echo("<script>location.replace('http://localhost/imc/editar_aluno.php?id=$id_aluno')</script>");
}
?>

<?php include('footer.php'); ?>

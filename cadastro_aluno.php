

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
        <h1>Cadastro de Aluno</h1>
        <p class="lead hidden">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>
      <div class="row">
        <div class="col-md-7">
        <form class="form-horizontal" action="?save" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2" for="nome">Nome:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" placeholder="Digite o nome" name="nome">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="cpf">CPF:</label>
          <div class="col-sm-10">
            
            <input type="text"   maxlength="18" onkeydown="javascript: fMasc( this, mCPF );" class="form-control" id="cpf"  placeholder="Digite o CPF"  name="cpf">

          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="idade">Idade:</label>
          <div class="col-sm-10">          
            <input type="number" class="form-control" id="idade" placeholder="Idade" name="idade">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="serie">Série:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="serie" placeholder="Série do aluno" name="serie">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="turma">Turma:</label>
          <div class="col-sm-10">          
            <input type="turma" class="form-control" id="turma" placeholder="Digite a turma" name="turma">
          </div>
        </div>
    
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Salvar</button>
          </div>
        </div>
      </form>
        </div>
        <div class="col-md-5">
          <div style="  display: flex;
  justify-content: center;
  align-items: center;">
             <ion-icon name="person-add-outline" style="zoom:10"></ion-icon>
          </div>
       
        </div>
      </div>
      
			
	
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

   $sql ="INSERT INTO alunos (nome,idade,turma,serie,cpf)VALUES('".$_POST["nome"]."', '".$_POST["idade"]."','".$_POST["turma"]."','".$_POST["serie"]."','".$_POST["cpf"]."')";
     
   $result = mysqli_query($conexao, $sql) or die(mysql_error());

   echo("<script>alert('Aluno cadastrado')</script>");
   echo("<script>location.replace('http://localhost/imc/cadastro_aluno.php')</script>");
}   
?>

<?php include('footer.php'); ?>

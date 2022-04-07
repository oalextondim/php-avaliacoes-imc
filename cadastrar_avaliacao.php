

<?php include('header.php'); ?>

<?php include('include/connection.php'); 
$aluno = null;

$sql_aluno = "SELECT * FROM alunos where id  ='".($_GET["id_aluno"])."'";
$result = mysqli_query($conexao, $sql_aluno) or die(mysql_error()); 

while ($row = mysqli_fetch_array($result))
{
  $aluno =  $row['nome'];
}

?>
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
           <a class="navbar-brand" href="#">Seminário Implementação de uma Aplicação WEB </a>
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
        <h1>Avaliações do aluno <a href="editar_aluno.php?id=<?php echo $_GET["id_aluno"]; ?>"><?php echo $aluno; ?></a></h1>
        
      </div>
      <form class="form-horizontal" action="?save" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="altura">Altura:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="altura" placeholder="Digite a altura" name="altura" onkeyup="formatarAltura()">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="peso">Peso:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="peso" placeholder="Digite o peso" name="peso">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="idade">Data avaliação:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="data" onkeyup="mascara_data(this, this.value)" maxlength="10" name="data">
        <input type="hidden" class="form-control" id="id_aluno" value="<?php echo $_GET["id_aluno"]; ?>"   name="id_aluno">
      </div>
    </div>

    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Salvar</button>
      </div>
    </div>
  </form>
			
	
    </div><!-- /.container -->
</section>

<?php 
   
   $sql = "SELECT * FROM avaliacoes where id_aluno ='".($_GET["id_aluno"])."' order by ID DESC";

    
   $result = mysqli_query($conexao, $sql) or die(mysql_error()); 

   

   
   ?>
<section>
  <div class="container">
    <div class="row">
    <div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading"><h2>Listagem</h2></div>
	<!-- Table -->
						<table class="table table-hover">
							<thead>
									<tr>
                    <th>#</th>
										<th>Altura</th>
										<th>Peso</th>
										<th>IMC</th>
									</tr>
								</thead>
								<tbody>
				 <?php
             while(  $rows =  mysqli_fetch_assoc($result)){
                 ?>						
									<tr>
                  <td> 
											<a href="javascript:void(0)" onclick="deleteRow(<?php echo($rows['id']); ?>)">
												<ion-icon  style="zoom:1.5" name="trash"></ion-icon>
												</a>	
                      </td>
                    <td><?php echo ($rows['altura']); ?></td>
										<td><?php echo ($rows['peso']); ?></td>
										<td> 

										
											<?php $imc = calculo_imc($rows['altura'], $rows['peso']); 
                      
                        if($imc <= 20){ 
                          echo "Seu IMC é $imc - <b>Abaixo do peso</b>";
                        }elseif($imc >20 and $imc<=25){
                          echo "Seu IMC é $imc - <b>Normal</b>";
                        }elseif($imc >25 and $imc <=30 ){
                          echo "Seu IMC é $imc - <b>Sobrepeso</b>";
                        }elseif($imc > 30 AND $imc < 34.9){
                          echo "Seu IMC é $imc - <b>Obsidade grau I</b>";
                        }elseif($imc > 35 AND $imc < 39.9){
                          echo "Seu IMC é $imc - <b>Obsidade grau II</b>";
                         
                        }else{
                          echo "Seu IMC é $imc - <b>Obsidade grau III ou Mórbida</b>";
                        }
                      ?>

										</td>
												
									</tr>
				
					<?php
             }
           
             ?>
								<tr style="background: #eee">
										<td></td>
										<td></td>
                    <td></td>
										<td class="text-right"><b>Total </b><?php echo  mysqli_num_rows($result); ?></td>
										 
									</tr>
								</tbody>
							</table>
	</div>
    </div>
  </div>
</section>

    </div><!-- /.container -->


<?php 

function calculo_imc($altura, $peso){
  $altura = str_replace(',', '.', $altura);
  $result = $peso / ($altura * $altura);

  return number_format($result,2,",",".");;
    
   
}

if(isset($_POST) and isset($_GET["save"])){





  $dataP = explode('-', $_POST["data"]);
  $dataNoFormatoParaOBranco = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];

  $sql ="INSERT INTO avaliacoes (altura,peso,id_aluno,data)
  VALUES('".$_POST["altura"]."', '".$_POST["peso"]."','".$_POST["id_aluno"]."','".$dataNoFormatoParaOBranco."')";
     
  $result = mysqli_query($conexao, $sql) or die(mysql_error());
  $id_aluno = $_POST["id_aluno"];
 
 echo("<script>location.replace('http://localhost/imc/cadastrar_avaliacao.php?id_aluno=$id_aluno')</script>");
  
  
} 
?>

<?php include('footer.php'); ?>

<script>
function mascara_data(campo, valor){
  var mydata = '';
  mydata = mydata + valor;
  if (mydata.length == 2){
    mydata = mydata + '-';
    campo.value = mydata;
  }
  if (mydata.length == 5){
    mydata = mydata + '-';
    campo.value = mydata;
  }
}


    function formatarAltura() {
        var elemento = document.getElementById('altura');
        var valor = elemento.value;

        valor = valor + '';
        valor = parseInt(valor.replace(/[\D]+/g, ''));
        valor = valor + '';
        valor = valor.replace(/([0-9]{2})$/g, ",$1");

        if (valor.length > 6) {
            valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        }

        elemento.value = valor;
        if(valor == 'NaN') elemento.value = '';
    }
</script>

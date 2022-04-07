

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
					<li class="active"><a href="./">Geral</a></li>
            <li><a href="cadastro_aluno.php">Cadastro de Aluno</a></li>
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Cadastro de alunos e avaliações IMC</h1>
        
      </div>

			<?php $listar_alunos_sql = "select * from alunos";
            //$conexao = mysqli_connect("localhost", "root", "", "imc");
             $result = mysqli_query($conexao, $listar_alunos_sql) or die(mysql_error());
        
						 ?>
						 	<div class="row">
						  
								 
				
			
	<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading"><h2>Listagem</h2></div>
	<!-- Table -->
						<table class="table table-hover">
							<thead>
									<tr>
										<th>Nome</th>
										<th class="text-center">Idade</th>
										<th >Ação</th>
									</tr>
								</thead>
								<tbody>
				 <?php
             while(  $rows =  mysqli_fetch_assoc($result)){
                 ?>						
									<tr>
										<td class="col-md-6"><?php echo ($rows['nome']); ?></td>
										<td class="col-md-2 text-center"><?php echo ($rows['idade']); ?></td>
										<td style=" display: flex;
  justify-content: center;
  align-items: center;"> 
										
									 
											<a style="color: green !important; margin-right: 5px" href="cadastrar_avaliacao.php?id_aluno=<?php echo $rows['id']?>" >
												<ion-icon style="zoom:1.2" name="list-outline"></ion-icon> <b>Avaliações</b> 
											</a> 
									 
										 
										<a style="color: # !important; margin-right: 5px" href="editar_aluno.php?id=<?php echo $rows['id']?>" >
											<ion-icon style="zoom:1.2" name="create"></ion-icon> 	Editar Aluno
											</a>
									 
									 		<a style="color: red !important; margin-right: 5px"  href="javascript:void(0)" onclick="deleteRow(<?php echo($rows['id']); ?>)">
												<ion-icon  style="zoom:1.2" name="trash"></ion-icon> Excluir aluno
												</a>

										 
										</div>
											
											
											

												
												</div>
										</td>
												
									</tr>
				
					<?php
             }
           
             ?>
								<tr style="background: #eee">
										<td></td>
										<td></td>
										<td class="text-right"><b>Total </b><?php echo  mysqli_num_rows($result); ?></td>
										 
									</tr>
								</tbody>
							</table>
	</div>
    </div><!-- /.container -->
</section>


<script>
	function deleteRow(id){

		$.ajax({
    url: 'ajax_del.php?id=' + id,
    success: function(){
			alert("Aluno removido! Página será atualizada.");
			setTimeout(function() {
       window.location.href = "http://localhost/imc/"
      }, 5000);
    }
  });
		
		
	}
</script>
<?php include('footer.php'); ?>

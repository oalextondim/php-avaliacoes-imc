

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
            <li><a href="#contact">Cadastro de avaliação</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

			<?php $listar_alunos_sql = "select * from alunos";
            //$conexao = mysqli_connect("localhost", "root", "", "imc");
             $result = mysqli_query($conexao, $listar_alunos_sql) or die(mysql_error());
        
						 ?>
						 	<div class="row">
						  
								 
				
				 </div>
	<div class="panel panel-default">
							<!-- Default panel contents -->
							<div class="panel-heading"><h2>Listagem</h2></div>
	<!-- Table -->
						<table class="table table-hover">
							<thead>
									<tr>
										<th>Nome</th>
										<th>Idade</th>
										<th>Ação</th>
									</tr>
								</thead>
								<tbody>
				 <?php
             while(  $rows =  mysqli_fetch_assoc($result)){
                 ?>						
									<tr>
										<td><?php echo ($rows['nome']); ?></td>
										<td><?php echo ($rows['idade']); ?></td>
										<td> 
											<a href="editar_aluno.php?id=<?php echo $rows['id']?>">
												<ion-icon style="zoom:2" name="create"></ion-icon>
											</a>

											<a href="javascript:void(0)" onclick="deleteRow(<?php echo($rows['id']); ?>)">
												<ion-icon  style="zoom:2" name="trash"></ion-icon>
												</a>	
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

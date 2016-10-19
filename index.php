<?php session_start(); 

include_once 'validar.php';
///verficar os parametros da busca

if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {

	$pesquisa = $_POST['nome'];

	$url = "https://api.github.com/search/users?q=$pesquisa";

	include_once 'pesquisar.php';

	$arr_result = pesquisa($url);


	$total_geral = $arr_result['total_count'];
	$resultados = $arr_result['items'];
}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Pagina</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
</head>
	
<body>
	<div class="form-inline" style="width:80%; padding-left: 100px;padding-top: 50px;">	
		<form action="index.php" method="POST" style="margin-bottom: 30px;">
			<input type="text" class="form-control" placeholder="Nome" name="nome" style="width: 426px;">
			<input type="submit" value="Busca" class="btn btn-success">
			<a href="sair.php" class="btn btn-danger">Sair do usuario</a>	
		</form>
	</div>
    <table class="table table-hover" border="1px" bgcolor="red">
		<thead>
			<tr class="info">
				<th>Foto</th>
				<th>Nome</th>
			</tr>
		</thead>
		
		<tbody>
		<?php
		if (isset($resultados)) : ?>
		 <?php 		
			foreach ($resultados as $res) : ?>	
			
			<tr>
				<td width="50px"><img src="<?=$res['avatar_url']?>" width="50" height="50"/></td>
				<td align='center'>
					<div>
						<label>Usuario : </label>
						<?=$res['login']?>
					</div>
					<a href="lista.php?usuario=<?=$res['login']?>&foto=<?=$res['avatar_url']?>" >Vê lista de repositório</a>
				</td>
			</tr>
		
		<?php endforeach; 
		endif;?>

		</tbody>
	</table>

</body>

</html>
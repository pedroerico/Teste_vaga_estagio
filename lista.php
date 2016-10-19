<?php session_start(); 

include_once 'validar.php';

if (isset($_GET['usuario']) && strlen($_GET['usuario']) > 0) {

	$pesquisa = $_GET['usuario'];

	$url = "https://api.github.com/users/$pesquisa/repos";

	include_once 'pesquisar.php';

	$arr_result = pesquisa($url);
	$resultados = $arr_result;
} else {
	//voltava pra busca
	header('location:index.php');
	die();	
}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Repositório</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
</head>
	
<body>
<a href="index.php" class="btn btn-danger">Voltar</a>
<br>
<div style="margin: 10px;">
	<div>
		<img src="<?=$_GET['foto']?>" width="100px" height="100px">
	</div>
	
	<label>Login : <?=$_GET['usuario']?></label>
	
</div>

<label>Lista de repositório:</label>
    <table class="table table-hover" border="1px" bgcolor="red">
		<thead>
			<tr class="info">
				<th>Nome</th>
				<th>Descrição</th>
			</tr>
		</thead>
		
		<tbody>
		<?php
		 if (isset($resultados)) : 
			foreach ($resultados as $res) : ?>	
			
			<tr>
				<td style="width: 35%">
					<a href="<?=$res['html_url']?>" target="_blank"><?=$res['name']?></a>
				</td>
				<td align='center'>
					<?=$res['description']?>
				</td>
			</tr>
		
		<?php endforeach; endif;?>
		</tbody>
	</table>

</body>

</html>
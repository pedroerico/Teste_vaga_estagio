<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<style type="text/css">
		.login{
			margin-top: 50px;
			margin-left: 35%;
			margin-right: 35%;
		}
	</style>
</head>
<body>
	<div class="login">
	<div style="text-align: center">	
	<svg aria-hidden="true" class="octicon octicon-mark-github" height="100" version="1.1" viewBox="0 0 16 16" width="100"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
	<br/>
	<br>
	<br>
	<label>Informações do GitHub</label>
	<br>
	</div>
		<form class="form-horizontal" method="POST" action="index.php">
			<div class="form-group">
				<label for="usuario" class="col-sm-2 control-label">Usuario</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Usuario" name="usuario">
				</div>
			</div>
			<div class="form-group">
				<label for="senha" class="col-sm-2 control-label">Senha</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" placeholder="Senha" name="senha">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Entrar</button>
				</div>
			</div>

			<?php if (isset($_GET['erro'])) : ?>
			<div class="form-group">
				<label class="col-sm-10 control-label"><?=$_GET['erro']?></label>
			</div>

			<?php endif; ?>	
		</form>
		
	<div>
</body>
</html>
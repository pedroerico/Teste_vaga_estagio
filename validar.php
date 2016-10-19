<?php

//verificar se tem usuario e se não está NULL
if(isset($_POST['usuario']) and $_POST['usuario']!='')
{
	
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;

	include_once 'pesquisar.php';

	$url = "https://api.github.com/users/octocat/orgs";
	$arr_result = pesquisa($url);

	if (count($arr_result) > 0)
	{
		session_destroy();
	 
	    //Limpa
	    unset ($_SESSION['usuario']);
	    unset ($_SESSION['senha']);

		header('location:login.php?erro=Usuario ou senha invalida!');
		die();
	}
}

//verificar se existir sessão de usuario(logado)
if ( !isset($_SESSION['usuario']) and !isset($_SESSION['senha']) ) {
	    //Destrói
	    session_destroy();
	 
	    //Limpa
	    unset ($_SESSION['usuario']);
	    unset ($_SESSION['senha']);
	     
	    //Redireciona para a página de autenticação
	    header('location:login.php');
	    die();
}
?>
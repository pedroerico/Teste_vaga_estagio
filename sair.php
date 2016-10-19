<?php session_start(); 


		session_destroy();
	 
	    //Limpa
	    unset ($_SESSION['login']);
	    unset ($_SESSION['senha']);
	     
	    //Redireciona para a página de autenticação
	    header('location:login.php');

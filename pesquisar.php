<?php

function pesquisa($url) {
	$authentication = $_SESSION['usuario'].":".$_SESSION['senha'];
	$user_agent = $_SESSION['usuario'];

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);

	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
	curl_setopt($ch, CURLOPT_USERPWD, $authentication);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	$response = curl_exec($ch);
	$arr_result = array();
	
	//Verificando Erro
	if(curl_exec($ch) === false) { 
		echo 'Curl error: ' . curl_error($ch); 
		session_destroy();
		header('location:login.php?erro=Falha na conexao com o servidor do github!');
	} else { 
		//Retirando o Cabeçalho
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($response, 0, $header_size);
		$body = substr($response, $header_size);
		//$pos_chave = strpos($body, '{');
		//$body = substr($body, $pos_chave);
		
		$arr_result = json_decode($body, TRUE);
	}

	return $arr_result;
}
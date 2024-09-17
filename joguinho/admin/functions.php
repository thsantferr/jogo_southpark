<?php
	// Função para a conexão com o banco
	function Conecta(){
		$PDO = new PDO('mysql:host='.HOST.';dbname='.DB.';charset=utf8',USER,PASS);
		return $PDO;
	}
	
	//Função para verificar se o usuário está logado
	function Verificalogin(){
		if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
			return false;
		}
		return true;
	}
?>
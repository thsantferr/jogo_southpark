<?php 
	session_start();
	include_once('../config.php');
	include_once('functions.php');
	include_once('conferelogin.php');
	$idquest = $_GET['pe'];
	$sql = 'DELETE FROM perguntas WHERE idquest = ?';
	
	try{
		$query = $bd->prepare($sql);
		$query->execute(array($idquest));
		$query->execute();
	}catch(PDOException $e){
		echo $e->getMessage();
		}
		
	$sql = 'DELETE FROM resposta WHERE questnum = ?';
	
	try{
		$query = $bd->prepare($sql);
		$query->execute(array($idquest));
		$query->execute();
		header('location:paglogin.php');
	}catch(PDOException $e){
		echo $e->getMessage();
		}

?>
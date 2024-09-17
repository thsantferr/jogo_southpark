<?php
	ob_start();
	include_once('../config.php');
	include_once('functions.php');
	$login = isset($_POST['login']) ? $_POST['login'] : '';
	$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
	if(empty($login) || empty($pass)){
		echo 'Preencha todos os campos seu viadinho !';
		exit;
	}
	$PDO = conecta();
	$sql = 'SELECT * FROM users WHERE user = :login and pass = :pass';
	$query = $bd ->prepare($sql);
	$query->bindValue(':login', $login);
	$query->bindValue(':pass', $pass);
	$query->execute();
	$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
	if(count($usuarios) <= 0 ){
		echo '<h1>BABACA! Você tentou me enganar</h1>';
		exit;
	}
	$usuario = $usuarios[0]; 
	session_start();
	$_SESSION['logado'] = true;
	$_SESSION['iduser'] = $usuario['iduser'];
	$_SESSION['login'] = $usuario['user'];
	header('location: paglogin.php');
	ob_end_flush();
?>
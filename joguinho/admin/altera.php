<?php
session_start();
include_once('../config.php');
include_once('functions.php');
include_once('conferelogin.php');
 if(isset($_POST['submit'])){
	 //=======================
	 echo $_POST['idquest'];
	 echo $_POST['quest'];
	 $sql = 'update perguntas set quest = :quest where idquest = :idquest';
	 try{
			 $query = $bd->prepare($sql);
			 $query->bindValue(':quest', $_POST['quest'], PDO::PARAM_STR);
			 $query->bindValue(':idquest', $_POST['idquest'], PDO::PARAM_STR);
	 }
	 catch(PDOException $e){
			echo $e-> getMessage();
	 }
	 //=======================
	 for( $u = 1 ; $u <= 4; $u ++){
	 $sql = 'UPDATE resposta SET resp = :resp , v_f = 0 WHERE idresp = :idresp';
		 echo $_POST['resp'. $u];
		 echo $_POST['idresp'. $u];
		 try{
				 $query = $bd->prepare($sql);
				 $query->bindValue(':resp', $_POST['resp'. $u], PDO::PARAM_STR);
				 $query->bindValue(':idresp', $_POST['idresp'. $u], PDO::PARAM_STR);
				 $query->execute();
		 }
		 catch(PDOException $e){
				echo $e-> getMessage();
		 }
	 }
	 echo $_POST['resprd'];
	 //=======================
	 $sql = 'UPDATE resposta SET v_f = 1 WHERE idresp = :idresp';
	 try{
			 $query = $bd->prepare($sql);
			 $query->bindValue(':idresp', $_POST['resprd'], PDO::PARAM_STR);
			 $query->execute();
			 header('location:paglogin.php');
		 }
	 catch(PDOException $e){
			echo $e-> getMessage();
	 }
 }
?>
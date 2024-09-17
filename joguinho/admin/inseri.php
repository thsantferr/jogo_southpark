<?php
	session_start();
	include_once('../config.php');
	include_once('functions.php');
	include_once('conferelogin.php');
	if(isset($_POST['submit'])){
		
			$sql = 'INSERT INTO perguntas (idquest, quest) VALUES (null, :quest )';
			try{
				$query = $bd->prepare($sql);
				$query->bindValue(':quest', $_POST['pergunta'], PDO::PARAM_STR);
				$query->execute();
				}
			catch(PDOException $e){
				echo $e->getMessage();
				}
			$sql = 'SELECT idquest FROM perguntas WHERE quest = :quest';
			try{
				$query = $bd->prepare($sql);
				$query->bindValue(':quest', $_POST['pergunta'], PDO::PARAM_STR);
				$query->execute();
				$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			}catch(PDOException $e){
				echo $e->getMessage(); 
			}
			foreach($resultado as $r){
				$idquest = $r['idquest'];
			}
			for ($i = 1; $i <= 4; $i ++){
				$sql = 'INSERT INTO resposta (idresp, resp, questnum, v_f) VALUES (null, :resp, :idquest, 0)';
				try{
					$query = $bd->prepare($sql);
					$query->bindValue(':resp', $_POST['resp' . $i], PDO::PARAM_STR);
					$query->bindValue(':idquest', $idquest, PDO::PARAM_STR);
					$query->execute();
				}
				catch(PDOException $e){
					echo $e->getMessage();
				}				
			}
			$vf = $_POST[$_POST['resp']];
			$sql = 'UPDATE resposta SET v_f = 1 WHERE resp = :resp  and questnum = :idquest' ;
				try{
					$query = $bd->prepare($sql);
					$query->bindValue(':resp', $vf, PDO::PARAM_STR);
					$query->bindValue(':idquest', $idquest, PDO::PARAM_STR);
					$query->execute();
				}
				catch(PDOException $e){
					echo $e->getMessage();
				}
			header('location:paglogin.php');
		}
?>
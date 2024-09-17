<?php
	ob_start();
    include_once('config.php');
	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];
		$sql = 'SELECT * FROM perguntas';
		try{
			$query = $bd->prepare($sql);
			$query->execute();
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			$lines = $query->rowCount();
		}catch(PDOException $e){
			echo $e->getMessage(); 
		}
		$total = 0;
		for($count = 1; $count <= $lines ; $count ++){
			if (empty($_POST['resp' . $count])){
				header("Location: /jogo.php");
				exit();
			}
			$teste = $_POST['resp' . $count];
			$sql1= 'SELECT v_f FROM resposta WHERE idresp =?';
			try{
				$query = $bd->prepare($sql1);
				$query->execute(array($teste));
				$resultado2 = $query->fetchAll(PDO::FETCH_ASSOC);
				foreach($resultado2 as $r){
					$val = $r['v_f'];
					if( $val == 1){
						$total = $total + 1;
					}
					if($count == $lines){
						header("Location: /fim.php?t=". $total . "&n=" . $nome . "&v=" . $lines );
						exit();
					}
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}	
		}
	}
	ob_end_flush();
?>
<?php
	include_once('config.php');
	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];}
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link type="text/css" href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<title>South Park Quiz</title>
</head>
<body class="pagjogo font">
	<p>
	   <form id="form1" name="form1" method="post" action="variaveis.php" onSubmit="return validaquiz();"  class="" >
	  <?php
	  		echo '<input type="hidden" name="nome" id="nome" value="' . $nome . '"  >';
	  		$sql = 'SELECT * FROM perguntas';
			$u = 0;
			$ids = array();
			try{
				$query = $bd->prepare($sql);
				$query->execute();
				$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
				$lines = $query->rowCount();
				$u = 0;
				$ids = array();
				foreach($resultado as $h){
						$u = $u + 1;
						$ids[$u] = $h['idquest'];
				}
			}catch(PDOException $e){
				echo $e->getMessage(); 
			}
			for($count = 1; $count <= $lines; $count ++){
			$sql1 = 'SELECT * FROM perguntas WHERE idquest = ' . $ids[$count];
			try{
				$query = $bd->prepare($sql1);
				$query->execute();
				$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
				
			}catch(PDOException $e){
				echo $e->getMessage(); 
			}	
			$sql2 = 'SELECT * FROM resposta rs INNER JOIN perguntas ps ON ps.idquest = rs.questnum AND idquest =' . $ids[$count];
			try{
				$query = $bd->prepare($sql2);
				$query->execute();
				$resultado2 = $query->fetchAll(PDO::FETCH_ASSOC);
			}catch(PDOException $e){
				echo $e->getMessage(); 
			}
			echo '<p>&nbsp;</p>'; 
			foreach($resultado as $r){
				echo '<p>' . $r['quest'] . '</p>';
				echo '<p>';
				foreach($resultado2 as $t){
					echo '<p>';
					echo '<label> <input type="radio" id="resp' . $count . '" name="resp' . $count . '" value="' . $t['idresp']  .'"  required >' . $t['resp'] .'</label> </p>';
				   }
					echo'</p>';
					echo '<p>&nbsp;</p>';		 
					}
			}
			
					echo '<input type="submit" name="submit" id="submit" value="vamos la" class="font" >';

			?>
     </form>
     
     </p>
	<p>&nbsp;</p>
</body>
<script language="javascript">
    function validaquiz(){
		atalho = document.form1;
		<?php
		for($count = 1; $count <= $lines; $count ++){
		echo 'if(atalho.resp' . $count . '[0].checked == false && atalho.resp' . $count . '[1].checked == false && atalho.resp' . $count . '[2].checked == false && atalho.resp' . $count . '[3].checked == false ){ alert("Selecione um das opções"); atalho.resp' . $count . '.focus(); return false;} ';
		}
		echo '}';
	?>
    </script>
</html>
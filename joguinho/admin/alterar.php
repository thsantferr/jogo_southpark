<?php
session_start();
include_once('../config.php');
include_once('functions.php');
include_once('conferelogin.php');
$idquest = $_GET['pe'];
$sql = 'SELECT * FROM perguntas where idquest = ?';
try{
	$query = $bd->prepare($sql);
	$query->execute(array($idquest));
	$reresultado = $query->fetch(PDO::FETCH_LAZY);
	}
catch(PDOException $e){
	echo $e->getMessage();
	}
	$sql1 = 'SELECT * FROM resposta rs INNER JOIN perguntas ps ON ps.idquest = rs.questnum AND idquest =' . $idquest;
	try{
		$query = $bd->prepare($sql1);
		$query->execute();
		$resultado1 = $query->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		echo $e->getMessage(); 
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link type="text/css" href="../css/style.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet" />
</head>
<body class="font pagalterar">
	<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<form name="form1" id="form1" method="post" action="altera.php" class="center-block text-center">
<input type="hidden" id="idquest" name="idquest" value="<?php echo $idquest ?>" />
<p> <label for="nome" style=" font-size: 5vh;" >Pergunta:</label> 
	<input type="text" id="quest" name="quest" size="80" required size="30px" maxlength="900" class="font" value="<?php echo $reresultado->quest ?>"  />
</p>
<?php
	foreach($resultado1 as $t){
			if($t['v_f'] >= 1){
				$vf = 'checked';
			}else{$vf = '';}
			$count = $count + 1;
			echo '<p>';
			echo '<label> <input type="radio" id="resprd" name="resprd" value="' . $t['idresp']  .'"  required '. $vf .' >';
			echo '<input type="text" maxlength="150" size="20px" name="resp' . $count . '" id="resp' . $count . '" value="' . $t['resp'] .'" required class="font">'; 
			echo '<input type="hidden" size="5px" id="idresp' . $count . '" name="idresp' . $count . '" value="' . $t['idresp'] . '" />';
			echo '</label> </p>';
			}
?>
<p> <input type="submit" name="submit" id="submit" value="Alterar" onClick="javascript: return verificar()" class="font" /> &nbsp;
	<a href="paglogin.php">Voltar</a></p> 
</form>
</body>
<script language="javascript">
		function verificar(){
				atalho = document.form1;
				if(atalho.resprd[0].checked == false && atalho.resprd[1].checked == false && atalho.resprd[2].checked == false && atalho.resprd[3].checked == false ){ 
					alert("Selecione um das opções"); 
					atalho.resp.focus(); return false;}
				if(atalho.quest.value == "" ){
					alert("Assim você me ferra")
					atalho.quest.focus();
					return false;
				}
				<?php
					for($i = 1; $i <= 4; $i ++){
						echo 'if(atalho.resp' . $i . '.value == "" ){';
						echo 'alert("Assim você me ferra")';
						echo 'atalho.resp' . $i . '.focus();';
						echo 'return false;';
						echo '}';
					}
				?>
		
    </script>
</html>
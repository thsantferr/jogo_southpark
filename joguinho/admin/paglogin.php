<?php 
	session_start();
	include_once('../config.php');
	include_once('functions.php');
	include_once('conferelogin.php');
	$sql = 'SELECT * FROM perguntas';
			try{
				$query = $bd->prepare($sql);
				$query->execute();
				$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
				
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
<script language="javascript">
function Confirma(idquest){
	resposta = confirm("deseja remover essa pergunta?");
	if(resposta == true){
		return true;
		}
		return false;	
	}
</script>
<body class="font paglog">
	<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
	<table>
        <tr>
            <td><strong>Perguntas</strong></td>
            <td><strong><a href="inserir.php">Nova Pergunta</a></strong></td>
        </tr>
         <?php
            foreach($resultado as $r){
                echo'<tr>';
                echo'<td>' .$r['quest'] .'</td>';
                echo'<td><a href="alterar.php?pe='. $r['idquest'] . '" >Alterar</a></td>';
                echo'<td><a href="excluir.php?pe=' . $r['idquest'] . '" onClick=" javascript:return Confirma('.$r['idquest'] . ') ">Excluir</a></td>'; 
            }
         ?>
         
	</table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>
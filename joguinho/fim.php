<?php
	include_once('config.php');
	$total = $_GET['t'];
	$nome = $_GET['n'];
	$lines = $_GET['v'];
	if ( $total <= 2){
		$mensagem = ' você é muito burro';
		$pontuação = 'Sua pontuação foi : '  . $total;
		}else 	if ( $total == 3 and $total <= $lines){
		$mensagem = ' ta acima acima da media olha so';
		$pontuação = 'Sua pontuação foi : '  . $total;
		}else 	if ( $total > 3 and $total <= $lines){
		$mensagem = ' você curte um humor negro igual o Cartman';
		$pontuação = 'Sua pontuação foi : '  . $total;
		}else if ( $total == '' and $total <= $lines ){
			$total = 0;
			$pontuação = 'Sua pontuação foi : '  . $total;
		}else if ($total > $lines ){
			$mensagem = ' trapaceiro. ';
			$pontuação = 'Você é um cara de bunda';
			$nome = 'Seu Bostinha';}
	
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link type="text/css" href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
<title></title>
</head>

<body class="pagfim">
<h1 class="font alinhamento"><?php echo $nome; echo $mensagem . '<br /></h1>'; echo '<h2 class=" font alinhamento"> ' . $pontuação . '</h2>'; ?> 
</body>
</html>
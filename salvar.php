<?php
session_start();

//validacao dos dados e' feito no cliente
$pergunta = $_POST['pergunta'];
$resposta_correta = $_POST['resposta_correta'];
$resposta_incorreta1 = $_POST['resposta_incorreta1'];
$resposta_incorreta2 = $_POST['resposta_incorreta2'];

if (isset($_POST['proxima_pergunta'])){//submit button
	
	$_SESSION['perguntas_temp'] = $_SESSION['perguntas_temp'].$pergunta."#".$resposta_correta."#".$resposta_incorreta1."#".$resposta_incorreta2."#";
	header('Location: http://localhost/Trabalho1/quiz.php');
}else{//submit button
	$_SESSION['perguntas_temp'] = $_SESSION['perguntas_temp'].$pergunta."#".$resposta_correta."#".$resposta_incorreta1."#".$resposta_incorreta2."#";
	$dados = $_SESSION['perguntas_temp'];
	echo $dados;
	
	//salvar no banco
	
	$_SESSION['perguntas_temp']='';
}

?>
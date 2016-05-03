<?php
session_start();

$data= $_SESSION['perguntas_temp'];

$pergunta = $_POST['pergunta'];
$resposta_correta = $_POST['resposta_correta'];
$resposta_incorreta1 = $_POST['resposta_incorreta1'];
$resposta_incorreta2 = $_POST['resposta_incorreta2'];

$numero_pergunta = $_POST['numero_pergunta'];
$data = explode("#", $data);
$pergunta_editada = "";

for ($index=0; $index < count($data) - 1; $index+=4 ){

	if ($index == $numero_pergunta){
		$pergunta_editada = $pergunta_editada.$pergunta."#".$resposta_correta."#".$resposta_incorreta1."#".$resposta_incorreta2."#";
		continue;
	}
	$pergunta_editada = $pergunta_editada.$data[$index]."#".$data[$index+1]."#".$data[$index+2]."#".$data[$index+3]."#";
}

$_SESSION['perguntas_temp'] = $pergunta_editada;

header('Location: http://localhost/Trabalho1/quiz.php');

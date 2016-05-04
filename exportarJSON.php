<?php

$pergunta = $_POST['pergunta'];
$resposta_correta = $_POST['resposta_correta'];
$resposta_incorreta1 = $_POST['resposta_incorreta1'];
$resposta_incorreta2 = $_POST['resposta_incorreta2'];


$perguntas_jsons = array();

$perguntas_json[] = [
		"pergunta" => $pergunta,
		"respostas" =>[
		["resposta" => $resposta_correta, "verdadeira" => "1"],
		["resposta" => $resposta_incorreta1, "verdadeira" => "0"],
		["resposta" => $resposta_incorreta2, "verdadeira" => "0"]]
];

$texto = json_encode($perguntas_json);
$texto = substr($texto,1,strlen($texto)-2);//remove os colchetes do comeco e do fim

$handle = fopen("file.json", "w");
fwrite($handle, $texto);
fclose($handle);


header('Location: http://localhost/Trabalho1/quiz.php?json_criado=true');
<?php
session_start();

$pergunta_digitada = $_GET['pergunta_digitada'];

$perguntas = $_SESSION['perguntas_temp'];
$perguntas = explode("#", $perguntas);

function startsWith($haystack, $needle, $case=false){
 	if ($case)
 		return strpos($haystack, $needle, 0) === 0;

 	return stripos($haystack, $needle, 0) === 0;
}

$perguntas_json = array();

for ($index=0; $index < count($perguntas) - 1; $index+=4){
	
		if (startsWith($perguntas[index], $pergunta_digitada, false) == 1){
			$perguntas_json[] = array(
					"pergunta" => "a",
					"resposta_correta" => "b",
					"resposta_incorreta1" => "c",
					"resposta_incorreta2" => "d"
			
			);
		}
}



//Esta função converte um array em um Javascript Object Notation - JSON
// Fica mais fácil trabalhar assim do lado do Javascript
echo json_encode($perguntas_json);
?>
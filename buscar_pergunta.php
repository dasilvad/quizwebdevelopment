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
		if (startsWith($perguntas[$index], $pergunta_digitada, false) == 1){
			$perguntas_json[] = array(
					"pergunta" => $perguntas[$index],
					"resposta_correta" => $perguntas[$index+1],
					"resposta_incorreta1" => $perguntas[$index+2],
					"resposta_incorreta2" => $perguntas[$index+3]
			);
		}
}

echo json_encode($perguntas_json);
?>
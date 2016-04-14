<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=quiz;charset=utf8', 'root','daniel');
}catch (Exception $e){
	echo "Erro ao conectar com o banco de dados";
}

?>
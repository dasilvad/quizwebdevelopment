<?php
	session_start();
	if (!isset($_SESSION['login'])){
		header('Location: http://localhost/Trabalho1/login.php');
	}
	?>	
	<html>
	<head>
		<title>Quiz</title>
		<script type="text/javascript">
			function editarCriarQuiz(){
				document.getElementById("form_editarCriarQuiz").action = "quiz.php";
	        	document.getElementById("form_editarCriarQuiz").submit();
			}
		</script>
	</head>
	<body>
		<div align="right">
			<form method="POST" action="logout.php">
				<input type="submit" name="log_out" value="logout">
			</form>
		</div>
	
		<div style="background-color:#E8E8E8  ; color:black; padding:20px; margin-left: 300px; margin-right: 300px">
			<form method="post" id="form_editarCriarQuiz"> 
				<label>Buscar Pergunta: </label><input type="text" name="buscar_pergunta" id="buscar_pergunta_input">
				<button type="button" id="btn_busca">Buscar</button><br>
				<button onclick="editarCriarQuiz()" >Editar ou Criar Quiz</button>
			</form>
		</div>
		
		
	<table>
		<thead>
			
		</thead>
			<tbody>
				
			</tbody>
		</thead>
	</table>
	
	<script type="text/javascript">
			
			document.getElementById("buscar_pergunta_input").addEventListener("keyup", function(evt){
				var tbody = document.querySelector("table tbody");
				var ajax = new XMLHttpRequest();
				var pergunta_digitada = this.value;
				
				ajax.onreadystatechange = function(){	
					if(ajax.readyState == 4 && ajax.status == 200){
						var  pergunta_do_servidor = JSON.parse(ajax.responseText);
						var html = "";
						//alert(ajax.responseText);
						html = "<br>";
						for(pergunta of pergunta_do_servidor){

							html+= "<tr><td>"+ "<div style=\"background-color:#E8E8E8  ; color:black; padding:20px; margin-left: 300px; margin-right: 300px\">"
								+ "Pergunta: "+ pergunta.pergunta + "<br>"
								+ "Resposta correta: "+ pergunta.resposta_correta +"<br>"
							    + "Resposta Errada 1: "+ pergunta.resposta_incorreta1 +"<br>"
							    + "Resposta Errada 2: "+ pergunta.resposta_incorreta2 +"<br>"
							    +"</div> </td></tr>";
							
						}
		
						tbody.innerHTML = html;
					}
				}
				
				ajax.open("get", "buscar_pergunta.php?pergunta_digitada="+String (pergunta_digitada), true);
				ajax.send(null);
			});
			
		
		</script>	
	</body>
	
	</html>
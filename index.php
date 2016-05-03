<?php
	session_start();
	if (!isset($_SESSION['login'])){
		header('Location: http://localhost/Trabalho1/login.php');
	}
	?>	
	<html>
	<head>
		<title>Quiz</title>
		
	</head>
	<body>
		<div align="right">
			<form method="POST" action="logout.php">
				<input type="submit" name="log_out" value="logout">
			</form>
		</div>
	
		<div style="background-color:#E8E8E8  ; color:black; padding:20px; margin-left: 300px; margin-right: 300px">
			<form> 
				<label>Buscar Pergunta: </label><input type="text" name="buscar_pergunta" id="buscar_pergunta_input"><br>
				<button type="button" id="btn_busca">Buscar</button>
			</form>
			<button onclick="" >Adicionar Pergunta</button>
			<button onclick="" >Listar Perguntas</button>
		</div>
		
	<table>
		<thead>
			<tr>
			<th>Pergunta</th>
			<th>Resposta Correta</th>
			<th>Resposta Incorreta1</th>
			<th>Resposta Incorreta2</th>
			</tr>
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
					
						for(pergunta of pergunta_do_servidor){
							html += "<tr><td>" + pergunta.pergunta + "</td>"
									+ "<td>" + pergunta.resposta_correta + "</td>"
									+ "<td>" + pergunta.resposta_incorreta1 + "</td></tr>";
							
						}
		
						tbody.innerHTML = html;
					}
					
				
				}
				
				ajax.open("get", "buscar_pergunta.php?pergunta_digitada="+pergunta_digitada, true);
				ajax.send(null);
			});
			
		
		</script>	
	</body>
	
	</html>
<?php
header('Content-Type: text/html; charset=utf-8');

### DADOS DE CONEXÃO AO MYSQL ###
	$host = "localhost";
	$usuario = "acps";
	$senha = "1@asdfg";
	$base = "acps";
#################################


### FUNÇÕES DE CONEXÃO ###
	//Conexão ao banco de dados;
	$conexao = mysql_connect($host, $usuario, $senha) or print(mysql_error());
	//Conexão à base de dados;
	mysql_select_db($base, $conexao) or print(mysql_error());
#########################`

?>
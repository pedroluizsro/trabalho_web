<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 05/05/15
 * Time: 20:27
 */

header('Content-Type: text/html; charset=utf-8');

### DADOS DE CONEXУO AO MYSQL ###
	$host = "localhost";
	$usuario = "acps";
	$senha = "1@asdfg";
	$base = "acps";
#################################


### FUNЧеES DE CONEXУO ###
	//Conexуo ao banco de dados;
	$conexao = mysql_connect($host, $usuario, $senha) or print(mysql_error());
	//Conexуo р base de dados;
	mysql_select_db($base, $conexao) or print(mysql_error());
#########################`

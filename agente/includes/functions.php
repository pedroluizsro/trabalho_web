<?php

include_once("globals.php");
include_once("conexao.abre.php");

function queryExecuta($sql,$coluna){
	$sqlQuery = mysql_query($sql, $GLOBALS['conexao']);
	$sqlExecuta = mysql_fetch_array($sqlQuery);
	return $sqlExecuta[$coluna];
}

function defineTempo($tempo,$conexao){
	$sql = "SELECT `time` FROM `Configuracao` LIMIT 1";
	$coluna = "time";
	
	$GLOBALS['tempo'] = queryExecuta($sql,$coluna);
	return intval($GLOBALS['tempo']);
}

/**
 * @param $load
 * @return float
 */
function pegaLoad($load){
	$buscaLoad = shell_exec("cat /proc/loadavg");
	$GLOBALS['load'] = substr($buscaLoad, 0, 4);
	return floatval($GLOBALS['load']);
}

function pegaProcessoTop($idProcessoTop){
	$GLOBALS['idProcessoTop'] = shell_exec("ps -eo pid --sort pcpu | tail -1");
	return intval($GLOBALS['idProcessoTop']);
}

function programaAtivo($ativo,$conexao){
	$sql = "SELECT `ativo` FROM `Configuracao` LIMIT 1";
	$coluna = "ativo";
	
	$GLOBALS['ativo'] = queryExecuta($sql,$coluna);
	return intval($GLOBALS['ativo']);
}

/**
 * @param $ativo
 * @param $conexao
 * @return string
 */
function verStatus($ativo,$conexao){
	$sql = "SELECT `ativo` FROM `Configuracao` LIMIT 1";
	$coluna = "ativo";
	
	$GLOBALS['ativo'] = queryExecuta($sql,$coluna);
	if (intval($GLOBALS['ativo']) == 1) {
		return "Ligado";
	}else{
		return "Desligado";
	}	
}

/**
 * @param $status
 * @param $conexao
 */
function trocarStatus($status,$conexao){
	$sql = "UPDATE `Configuracao` SET `ativo`=$status WHERE 1";
	$sqlQuery = mysql_query($sql, $GLOBALS['conexao']);
}

?>

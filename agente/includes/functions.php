<?php

include_once("globals.php");
include_once("conexao.abre.php");

/**
 * @param $sql
 * @param $coluna
 * @return mixed
 */
function queryExecuta($sql,$coluna){
	$sqlQuery = mysql_query($sql, $GLOBALS['conexao']);
	$sqlExecuta = mysql_fetch_array($sqlQuery);
	return $sqlExecuta[$coluna];
}

/**
 * @param $tempo
 * @param $conexao
 * @return int
 */
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

/**
 * @param $idProcessoTop
 * @return int
 */
function pegaProcessoTop($idProcessoTop){
	$GLOBALS['idProcessoTop'] = shell_exec("ps -eo pid --sort pcpu | tail -1");
	return intval($GLOBALS['idProcessoTop']);
}

/**
 * @param $ativo
 * @param $conexao
 * @return int
 */
function programaAtivo($ativo,$conexao){
	$sql = "SELECT `ativo` FROM `Configuracao` LIMIT 1";
	$coluna = "ativo";
	
	$GLOBALS['ativo'] = queryExecuta($sql,$coluna);
	return intval($GLOBALS['ativo']);
}

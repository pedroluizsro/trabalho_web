<?php

include_once("globals.php");
include_once("conexao.abre.php");

/**
 * Executa uma Query(SELECT) e retorna uma coluna.
 * @param $sql
 * @param $coluna
 * @return mixed
 */
function selectExecuta($sql,$coluna){
	$sqlQuery = mysql_query($sql, $GLOBALS['conexao']);
	$sqlExecuta = mysql_fetch_array($sqlQuery);
	return $sqlExecuta[$coluna];
}

/**
 * Executa uma query qualquer sem retorno.
 * @param $sql
 */
function queryExecuta($sql){
    mysql_query($sql, $GLOBALS['conexao']);
}

/**
 * Busca o tempo de Sleep do banco de dados para a aplicação usar.
 * @param $tempo
 * @param $conexao
 * @return int
 */
function defineTempo($tempo,$conexao){
	$sql = "SELECT `time` FROM `Configuracao` LIMIT 1";
	$coluna = "time";
	
	$GLOBALS['tempo'] = selectExecuta($sql,$coluna);
	return intval($GLOBALS['tempo']);
}

/**
 * Consulta o Load do servidor.
 * @param $load
 * @return float
 */
function pegaLoad($load){
	$buscaLoad = shell_exec("cat /proc/loadavg");
	$GLOBALS['load'] = substr($buscaLoad, 0, 4);
	return floatval($GLOBALS['load']);
}


/**
 * Pega ID do processo que mais utiliza recurso.
 * @return int
 */
function pegaProcessoTop(){
	$idProcessoTop = shell_exec("ps -eo pid --sort pcpu | tail -1");
	return intval($idProcessoTop);
}

/**
 * Pega o nome do processo que mais utiliza recurso.
 * @return string
 */
function pegaNomeProcessoTop(){
    $nomeProcessoTop = shell_exec("ps -eo cmd --sort pcpu | tail -1");
    return $nomeProcessoTop;
}

/**
 * Seleciona do banco se programa está ativo ou não.
 * @param $ativo
 * @param $conexao
 * @return int
 */
function programaAtivo($ativo,$conexao){
	$sql = "SELECT `ativo` FROM `Configuracao` LIMIT 1";
	$coluna = "ativo";
	
	$GLOBALS['ativo'] = selectExecuta($sql,$coluna);
	return intval($GLOBALS['ativo']);
}

/**
 * Cria um relatório de ocorrência.
 * @param $nome_processo
 * @param $conexao
 */
function relatorioOcorrencia($nome_processo, $conexao){
    $validacao = selectExecuta($sql = "SELECT `nome_processo` FROM `Relatorio_ocorrencia` WHERE `nome_processo` = '$nome_processo'", $coluna = "nome_processo");
    if($nome_processo == $validacao){
        queryExecuta($sql = "UPDATE `Relatorio_ocorrencia` SET `qtd_ocorrencia`= `qtd_ocorrencia`+1 WHERE `nome_processo` = '$nome_processo'",$conexao);
    } else {
        queryExecuta($sql = "INSERT INTO `Relatorio_ocorrencia` (`nome_processo`, `qtd_ocorrencia`) VALUE ('$nome_processo',1);",$conexao);
    }
}

/**
 * Verifica se está nas exceções e retorna 1 para sim e 0 para não.
 * @param $nome_processo
 * @param $conexao
 * @return int
 */
function comparaExcecao($nome_processo, $conexao){
    $excecao = selectExecuta($sql = "SELECT `nome_processo` FROM `Excecao` WHERE `nome_processo` = '$nome_processo'", $coluna = "nome_processo");

    if($nome_processo == $excecao){
        return 1;
    } else {
        return 0;
    }
}

/**
 * Finaliza o processo e guarda relatório na base de dados.
 * @param $pid
 * @param $conexao
 */
function finalizaProcesso($pid, $conexao){
    shell_exec("kill -9 $pid");
    queryExecuta($sql = "INSERT INTO `relatorio_acao` (`alvo_processo`, `tipo_acao`, `data`) VALUES ($pid, 'Finalizado', NOW())");
    return;
}
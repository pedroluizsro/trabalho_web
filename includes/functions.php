<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 05/05/15
 * Time: 20:12
 */

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
 * Busca o status atual da aplicação(Ligado ou Desligado) do banco de dados.
 * @param $ativo
 * @param $conexao
 * @return string
 */
function verStatus($ativo,$conexao){
    $sql = "SELECT `ativo` FROM `Configuracao` LIMIT 1";
    $coluna = "ativo";

    $GLOBALS['ativo'] = selectExecuta($sql,$coluna);
    if (intval($GLOBALS['ativo']) == 1) {
        return "Ligado";
    }else{
        return "Desligado";
    }
}

/**
 * Altera o Status do banco.
 * @param $status
 * @param $conexao
 */
function trocarStatus($status,$conexao){
    $sql = "UPDATE `Configuracao` SET `ativo`=$status WHERE 1";
    $sqlQuery = mysql_query($sql, $GLOBALS['conexao']);
}


/**
 * Ver tempo atual de Sleep da aplicação.
 * @param $time
 * @param $conexao
 * @return int
 */
function verTime($time,$conexao){
    $sql = "SELECT `time` FROM `Configuracao` LIMIT 1";
    $coluna = "time";
    $GLOBALS['time'] = selectExecuta($sql,$coluna);

    return intval($GLOBALS['time']);
}

/**
 * Alterar o tempo de Sleep da aplicação.
 * @param $time
 * @param $conexao
 */
function trocarTime($time,$conexao){
    $sql = "UPDATE `Configuracao` SET `time`=$time WHERE 1";
    $sqlQuery = mysql_query($sql, $GLOBALS['conexao']);
}
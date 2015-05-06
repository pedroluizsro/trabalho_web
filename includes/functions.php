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

function verTime($time,$conexao){
    $sql = "SELECT `time` FROM `Configuracao` LIMIT 1";
    $coluna = "time";

    $GLOBALS['time'] = queryExecuta($sql,$coluna);

    return intval($GLOBALS['time']);
}

function trocarTime($time,$conexao){
    $sql = "UPDATE `Configuracao` SET `time`=$time WHERE 1";
    $sqlQuery = mysql_query($sql, $GLOBALS['conexao']);
}

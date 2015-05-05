<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 05/05/15
 * Time: 20:12
 */



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

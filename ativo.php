<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 05/05/15
 * Time: 20:11
 */

include_once("includes/functions.php");

$status = $_POST['ativo'];
trocarStatus($status,$conexao);

Header("Location: index.php");

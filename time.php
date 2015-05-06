<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 05/05/15
 * Time: 21:23
 */

include_once("includes/functions.php");

$time = $_POST['time'];
trocarTime($time,$conexao);

Header("Location: index.php");

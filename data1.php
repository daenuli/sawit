<?php 
$has = floor($_GET['total']);
$rest = substr($has,-1);
$has = $has - $rest;

echo $has;
?>
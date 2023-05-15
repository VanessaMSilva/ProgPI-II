<?php
session_start();
if(!$_SESSION['usuario'] || !$_SESSION['usuario1']) {
	header('Location: index.php');
	exit();
}else{
}
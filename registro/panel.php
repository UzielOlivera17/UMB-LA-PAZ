<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BIENVENIDA</title>
    <link rel="stylesheet" href="css/estilo1.css">

<h1>BIENVENIDO A SU CUENTA</h1> 
<br>
<a href="logout.php">CERRAR SESION</a>
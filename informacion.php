<?
session_start();
$_SESSION['nombre'];
$_SESSION['email'];
$_SESSION['edad'];
$_SESSION['pais'];
echo 'Hola ' . $_SESSION['nombre'] . ', tienes ' . $_SESSION['edad'] . ' años, eres de ' . $_SESSION['pais'] . ' y tu email es ' . $_SESSION['email'];
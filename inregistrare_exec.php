<?php
session_start();
include('connect.php');
$nume=$_POST['nume'];
$prenume=$_POST['prenume'];
$adresa=$_POST['adresa'];
$telefon=$_POST['telefon'];
$email=$_POST['email'];
$parola=$_POST['parola'];
$parola=md5($parola);
mysql_query("INSERT INTO clienti(nume, prenume, adresa, telefon, email, parola) VALUES('$nume', '$prenume', '$adresa', '$telefon', '$email', '$parola')");
header("location: inregistrare.php?remarks=success");
?>
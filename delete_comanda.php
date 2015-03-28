<?php
include('connect.php');
session_start();
if(isset($_SESSION['email'])) {
    if(isset($_POST)){
        $query = mysql_query("DELETE FROM comenzi WHERE id_comanda = '{$_POST['id_comanda']}'");
        header('Location: comanda.php');
    }
}
else {
    header('Location: contul-meu.php');
}
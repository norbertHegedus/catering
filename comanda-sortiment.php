<?php
include('connect.php');
session_start();
if(isset($_POST['add_to_cart_button'])){
    if (!isset($_SESSION['email'])) {
        header('Location: cont.php');
        exit;
    }
    else {       
        $query = mysql_query("SELECT id_client FROM clienti WHERE email = '{$_SESSION['email']}'");
        $row = mysql_fetch_array($query);
        $insert = mysql_query("INSERT INTO comenzi"
                            . "(`id_client`, `id_preparat`, `bucati`)"
                            . " VALUES('{$row['id_client']}', '{$_POST['id_preparat']}', '{$_POST['bucati']}')");     
        if($insert){
            header('Location: '.$_POST['meniu_type']);
        }
    }
}
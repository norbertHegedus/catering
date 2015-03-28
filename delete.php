<?php
include('connect.php');
if(isset($_POST)){
    foreach($_POST AS $col => $val){
        $query = mysql_query("DELETE FROM $col WHERE id_preparat = '$val'");
        if($query){
            header('Location: administrare.php?categorii='.$_POST['url_categorie']);
        }
    }
}

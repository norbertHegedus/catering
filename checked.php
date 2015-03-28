<?php
session_start();
if(isset($_SESSION['email'])){  
    if(isset($_POST['is_checked'])){        
        $_SESSION['checked'][$_POST['id_preparat']] = '1'; 
    }    
    else {
        $_SESSION['checked'][$_POST['id_preparat']] = '0'; 
    }
    var_dump($_SESSION);
    header('Location: comanda.php');
}
if(isset($_SESSION['username'])){
    if(isset($_POST['is_checked'])){
        $_SESSION['checked_admin'][$_POST['id_preparat']] = '1'; 
    }    
    else {
        $_SESSION['checked_admin'][$_POST['id_preparat']] = '0'; 
    }
    header('Location: comanda.php');
}

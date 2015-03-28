<?php
include('connect.php');
session_start();
if(isset($_SESSION['email'])){    
    if(!empty($_SESSION['checked'])){        
        foreach($_SESSION['checked'] AS $id_comanda => $val){
            if($val == '1'){
                $query = mysql_query("UPDATE comenzi SET adresa_livrare = '{$_POST['adresa_livrare']}', stare = '1' WHERE id_comanda = '$id_comanda'");
            }                        
        }
        unset($_SESSION['checked']);
        header('Location: comanda.php');
    }
}  
if(isset($_SESSION['username'])){    
    $date = getdate();
    $time = $date['hours'] + 3 . "." . $date['minutes'];
    if(!empty($_SESSION['checked_admin'])){        
        foreach($_SESSION['checked_admin'] AS $id_comanda => $val){
            if($val == '1'){
                $query = mysql_query("UPDATE comenzi SET data_livrare = CURDATE(), ora_livrare = $time, stare = '2' WHERE id_comanda = '$id_comanda'");
            }                        
        }
        unset($_SESSION['checked_admin']);
        header('Location: comanda.php');
    }
}  
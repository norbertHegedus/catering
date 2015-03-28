<?php
include('connect.php');
if(isset($_POST)){
    foreach($_FILES AS $image_type => $val){
        if($image_type == 'imagine_sortiment'){
            $uploadpath = "upload/" . $_FILES[$image_type]['name']; 
        }
        else if($image_type == 'imagine_sortiment_thumb'){
            $uploadpath = "upload_thumb/" . $_FILES[$image_type]['name']; 
        }
        if(move_uploaded_file($_FILES[$image_type]['tmp_name'], $uploadpath)) { 
            echo"Fisier: ". basename( $_FILES[$image_type]['name']). " a fost incarcat"; 
        } 
        else { 
            echo "Eroare!"; 
        }  
    }
    
    $query = "INSERT INTO preparate (`id_categorie`, `nume`, `ingrediente`, `pret`, `foto`, `foto_thumb`) VALUES (";

    foreach($_POST AS $key => $val){                
        $query .= "'" . $val . "' , ";       
    }        
    foreach($_FILES AS $key => $val){
        $last_key = end((array_keys($_FILES)));        
        $separator = $key == $last_key ? '' : ', ';
        foreach($val AS $col => $v){
            if($col == 'name')
                $query .= "'" . $v . "'" . $separator;
        }
    }    
    $query .= ")";
    mysql_query($query);
    header('Location: administrare.php');
}

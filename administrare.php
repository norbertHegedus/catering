<?php

function categorii($selected_id){
    $dropdown = '<select id = "categorii" name = "categorii">
                 <option value = ""></option>';
    $result = mysql_query("SELECT * FROM categorii");
    while($row = mysql_fetch_array($result)){ 
        $selected = $row['id_categ'] == $selected_id ? "selected" : "";
        $dropdown .= '<option name = "'.$row['id_categ'].'" value = "'.$row['id_categ'].'" '.$selected.'>'.$row['categoria'].'</option>';
    }    
    $dropdown .= '</select>';
    return $dropdown;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Catering - Administrare</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
    <link rel = "stylesheet" href = "admin_css/administrare.css">
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script> 
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>  
	<!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
        	<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
</head>
<body id="page5">
	<!--==============================header=================================-->
    <header>
        <?php 
            include('header.php'); 
            include('connect.php');
            include('secure-admin.php');
        ?>   
                </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
    <div id = "section_containter">
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="container">
                <h3 class = 'admin_h3'>Administrare site</h3>                                                                         
            </div>
        </div>
        <div id = "pannel">                           
            <div id = "top_pannel">
                <table class = "admin_table add_table">             
                    <div id = "add_button"><img src = "images/add.png"></div>
                    <form name = "adauga_sortiment" action = "db_opp.php" method = "POST" enctype="multipart/form-data">
                        <tr>
                            <td>Alege categorie</td>
                            <td><?php 
                                    $selected_id = "";
                                    echo categorii($selected_id); 
                                ?>
                            </td>                        
                        </tr>
                        <tr>
                            <td>Nume sortiment</td>
                            <td><input type = "text" name = "sortiment" /></td>
                        </tr>
                        <tr colspan = "2">
                            <td>Ingrediente</td>
                            <td><textarea name = "descriere_sortiment"></textarea></td>
                        </tr>
                        <tr>
                            <td>Pret</td>
                            <td><input type = "text" name = "pret_sortiment" /></td>
                        </tr>
                        <tr>
                            <td>Imagine mica</td>
                            <td><input type = "file" name = "imagine_sortiment" /></td>
                        </tr>
                        <tr>
                            <td>Imagine mare</td>
                            <td><input type = "file" name = "imagine_sortiment_thumb" /></td>                          
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class = "form_buttons">
                                    <span class = "icons"><img src = "images/plus.png" ></span>
                                    <span class = "text"><input type = "submit" value = "Adauga" /></span>
                                </div>
                            </td>
                        </tr>
                    </form>                
                </table> 
            </div>
            <div id = "bottom_pannel">
                <table class = "admin_table delete_table">
                    <form name = "sterge_sortiment" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "GET" >
                        <tr>                        
                            <td>Alege categorie</td>
                            <td><?php 
                                    $selected_id = isset($_GET['categorii']) ? $_GET['categorii'] : "";
                                    echo categorii($selected_id); 
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class = "form_buttons">
                                    <span class = "icons"><img src = "images/search.png" ></span>
                                    <span class = "text">
                                        <input type = "submit" value = "Cauta" />
                                    </span>                                    
                                </div>
                            </td>                                            
                        </tr>                                         
                    </form>
                <div id = "delete_button"><img src = "images/delete.png"></div>
                <?php
                if(isset($_GET['categorii']) && $_GET['categorii'] != ''){                             
                    $query = mysql_query("SELECT id_preparat, nume FROM preparate WHERE id_categorie = '".$_GET['categorii']."'");                    ;
                    if(mysql_num_rows($query) != 0){
                        echo '<th>Nume preparat</th><th>Sterge</th>';
                        while($row = mysql_fetch_array($query)){
                        $nume=$row['nume'];
                        $id=$row['id_preparat'];                                  
                        echo "<tr>
                                   <td class = 'to_delete'>
                                      <form name = 'delete' method = 'POST' action = 'delete.php'>
                                          <input type = 'hidden' name = 'preparate' value = '$id' />
                                          <input type = 'hidden' name ='url_categorie' value = '{$_GET['categorii']}'>
                                          <button type = 'submit' >Sterge</button>
                                      </form>
                                   </td>
                                   <td class = 'names'>$nume</td>
                             </tr>";
                        }
                    }                    
                }
                ?>   
                </table>
            </div>
        </div>
    </section>
    </div>
    
	<!--==============================footer=================================-->
    <?php
    include ("footer.php");    
    ?>
    <script type="text/javascript"> Cufon.now(); </script>
</body>
</html>

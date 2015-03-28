<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Catering - Comanda</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">  
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
        include('connect.php');
        include('header.php'); 
        ?>                    
                </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
     <div id = "section_containter">
    <section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - January 23, 2012!</div>
        <div class="main">
            <div class="container">            	
                <?php
                function stare($stare){
                    switch($stare){
                        case 0 : 
                            $stare = 'Nepreluata';
                            break;
                        case 1 :
                            $stare = 'In derulare';
                            break;
                        case 2 :
                            $stare = 'Livrat';
                            break;
                    }
                    return $stare;
                }
                if(isset($_SESSION['email'])){                  
                    $checked = '';                        
                    $query = mysql_query("SELECT comenzi.data_livrare, comenzi.id_comanda, preparate.nume, preparate.ingrediente, preparate.pret, comenzi.bucati, "
                           . "comenzi.bucati * preparate.pret AS total, comenzi.stare FROM comenzi "
                           . "INNER JOIN clienti "
                           . "ON comenzi.id_client = clienti.id_client "
                           . "INNER JOIN preparate "
                           . "ON preparate.id_preparat = comenzi.id_preparat "
                           . "WHERE clienti.email = '{$_SESSION['email']}' "
                           . "AND stare != 2 "
                           . "ORDER BY comenzi.stare");
                    $table = '<table id = "comenzi">';
                    if($query){                        
                        $comenzi = array();
                        if(mysql_num_rows($query) != 0){
                            while($row = mysql_fetch_array($query)){
                                $comenzi[$row['id_comanda']] = $row;
                            }
                            $table .= '<th></th><th>Preparat</th><th>Ingrediente</th><th>Pret</th><th>Bucati</th><th>Total</th><th>Stare</th><th>Actiuni</th>';
                            foreach($comenzi AS $id_comanda => $array){
                                if(isset($_SESSION['checked'][$array['id_comanda']]) && $_SESSION['checked'][$array['id_comanda']] == 1){
                                    $checked = "checked";
                                }
                                else {
                                    $checked = "";
                                }
                                $table .= '<tr>'; 
                                $table .= '<td>';
                                if($array['stare'] == 1){
                                    $table .= '<img src = "images/pending.png" style = "vertical-align:middle" />';
                                }
                                else if($array['stare'] == 2){
                                    $table .= '<img src = "images/checked.png">';
                                }
                                else {
                                    $table .= '<form method = "post" action = "checked.php">'
                                                . '<input type = "hidden" name = "id_preparat" value = "'.$array['id_comanda'].'">'                            
                                                . '<input type = "checkbox" name = "is_checked" value = "1" '.$checked.' onclick="this.form.submit();">'
                                            . '</form>';
                                }                                
                                foreach($array AS $col => $val){   
                                    if(is_numeric($col) || $col == 'id_comanda' || $col == 'data_livrare') continue;
                                    if($col == 'stare'){
                                        $val = stare($val);
                                    }
                                    $table .= "<td>$val</td>";
                                }                                           
                                $table .= '<td>'                                                                                            
                                            . '<form class = "inline_form" method = "post" action = "delete_comanda.php">'
                                                . '<input type = "hidden" name = "id_comanda" value = "'.$array['id_comanda'].'" />'
                                                . '<button type = "submit" name = "delete">'
                                                    . '<img src = "images/trash.png" />'
                                                . '</button>'
                                            . '</form>'
                                        . '</td>';
                                $table .= '</tr>';
                            }
                            $table .= '<tr><td colspan = 5 class = "last_child"></td>'
                                    . '<form action = "plasare_comanda.php" method = "post">'
                                    . '<td class = "form">'
                                        . '<textarea name = "adresa_livrare" placeholder = "Adresa livrare"></textarea>'
                                    . '</td>'
                                    . '<td class = "form">'
                                        . "<input type = 'submit' name = 'livreaza_comanda' value = 'Trimite' />"                               
                                    . '</td>'
                                    . "</form>";
                            $table .= '</table>';    
                            echo $table;
                        }                                        
                    }                    
                }
                // pt admin
                if(isset($_SESSION['username'])){
                    $query = mysql_query("SELECT c.id_comanda, cl.nume, cl.prenume, cl.telefon, pr.nume nume_preparat, pr.pret, "
                                       . "c.bucati, c.adresa_livrare FROM comenzi AS c "
                                       . "INNER JOIN clienti AS cl ON cl.id_client = c.id_client "
                                       . "INNER JOIN preparate AS pr ON pr.id_preparat = c.id_preparat "
                                       . "WHERE c.stare = 1 ORDER BY c.stare");
                    $livreaza = array();
                    $table = '<table id = "comenzi">';
                    $table .= '<tr><th></th><th>Nume</th><th>Prenume</th><th>Telefon</th><th>Preparat</th><th>Pret</th><th>Bucati</th><th>Adresa Livrare</th>';
                    if(mysql_num_rows($query) != 0){
                        while($row = mysql_fetch_array($query)){
                            $livreaza[$row['id_comanda']] = $row;
                        }
                        foreach($livreaza AS $id_comanda => $array){  
                            if(isset($_SESSION['checked_admin'][$array['id_comanda']]) && $_SESSION['checked_admin'][$array['id_comanda']] == 1){
                                $checked = "checked";
                            }
                            else {
                                $checked = "";
                            }
                            $table .= '<tr>';                           
                            $table .= '<td>'
                                    . '<form method = "post" action = "checked.php">'
                                    . '<input type = "hidden" name = "id_preparat" value = "'.$array['id_comanda'].'">';                              
                            $table .= '<input type = "checkbox" name = "is_checked" '.$checked.' value = "1" onclick="this.form.submit();">'
                                    . '</form></td>';
                            foreach($array AS $col => $val){   
                                if(is_numeric($col) || $col == 'id_comanda') continue;
                                $table .= "<td>$val</td>";
                            }                                           
                            $table .= '</tr>';
                        }
                    }  
                    $table .= '<tr><td colspan = 7 class = "last_child"></td><td class = "form">'
                                . "<form action = 'plasare_comanda.php' method = 'post'>"
                                     . "<input type = 'submit' name = 'livreaza_comanda' value = 'Livrare' />"
                               . "</form>"
                            . '</td>';
                    $table .= '</table>';
                    echo $table;
                    $form = "";
                    echo $form;   
                }
                ?>
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

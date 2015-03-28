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
                include 'secure-cont.php';
                include('connect.php');
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
                    $query = mysql_query("SELECT * FROM clienti WHERE email = '{$_SESSION['email']}'");
                    $user = mysql_fetch_array($query);
                    echo "<label class = 'contact_label'> Nume : </label>" . $user['nume'] . " " . $user['prenume'] . "<br />";
                    echo "<label class = 'contact_label'> Adresa : </label>" .$user['adresa'] . "<br />";
                    echo "<label class = 'contact_label'> Telefon : </label>" . $user['telefon'] . "<br />";
                    echo "<label class = 'contact_label'> Email : </label>" . $user['email'];
                    
                    $result = mysql_query("SELECT c.id_comanda, p.nume, p.ingrediente, p.pret, c.bucati, c.bucati * p.pret AS total, c.stare, c.data_livrare, c.ora_livrare "
                                        . "FROM comenzi AS c INNER JOIN preparate AS p "
                                        . "ON c.id_preparat = p.id_preparat "
                                        . "WHERE c.id_client = '{$user['id_client']}' "
                                        . "AND c.stare = '2' ORDER BY c.data_livrare DESC");
                            
                    if(mysql_num_rows($result) != 0){
                        $table = '<table id = "comenzi">';
                        $table .= '<th></th><th>Preparat</th><th>Ingrediente</th><th>Pret</th><th>Bucati</th><th>Total</th><th>Stare</th><th>Data Livrare</th><th>Ora Livrare</th>';
                        while($row = mysql_fetch_array($result)){   
                            $comenzi_livrate[$row['id_comanda']] = $row;
                        }
                        foreach($comenzi_livrate AS $id_comanda => $val){
                            $table .= '<tr>';
                            if($val['stare']){
                                $table .= '<td><img src = "images/checked.png"></td>';
                            }
                            foreach($val AS $col => $v){
                                if($col == 'id_comanda' || is_numeric($col)) continue;
                                else {
                                    if($col == 'stare'){
                                        $v = stare($v);
                                    }
                                    if($col == 'ora_livrare'){
                                        $v = str_replace('.', ":", $v);
                                    }
                                    $table .= "<td>$v</td>";
                                }
                            }
                            $table .= '</tr>';                            
                        }
                        $table .= '</table>';
                        echo $table;
                    }                    
                }
                ?>                               
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

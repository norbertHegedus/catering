
<?php 
    include('connect.php');
    function display_picture($id_categorie, $categorii) {
        $query = mysql_query("SELECT foto_thumb FROM preparate WHERE id_categorie = '$id_categorie' LIMIT 4");
        $i = 0;
        if(mysql_num_rows($query) != 0){
            $content = '';
            while($row = mysql_fetch_array($query)){                    
                $content .= "<a href = '$categorii.php' target = '_parent'><img src = 'upload_thumb/{$row['foto_thumb']}'></a>";
                if($i == 1){
                    $content .= "<p>";
                }
                $i++;
            }
        }
        else {
            $content = '';
        }
        return $content;
    }
?>

<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">     
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/slider-script.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script> 
<script src="js/Dynalight_400.font.js" type="text/javascript"></script>
<script src="js/FF-cash.js" type="text/javascript"></script>
<script src="js/tms-0.3.js" type="text/javascript"></script>
<script src="js/tms_presets.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/jquery.equalheights.js" type="text/javascript"></script>  

<body style = "background-color : #f2f2f2;">
<div class="wrapper">
    <article class="column-1">
            <div class="indent-left">
            <div class="maxheight indent-bot">
                <h3>Meniu</h3>
                <ul class="list-1">
                    <li>
                        <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF'];?>">
                            <input type = "hidden" name = "id_categorie" value = "1" />
                            <input type = "hidden" name = "categori" value = "mic-dejun" />
                            <input type = "submit" name = "mic-dejun" value = "Mic dejun" />                            
                        </form>
                    </li>
                    <li>
                        <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF'];?>">
                            <input type = "hidden" name = "id_categorie" value = "2" />
                            <input type = "hidden" name = "categori" value = "salate" />
                            <input type = "submit" name = "salate" value = "Salate" />
                        </form>
                    </li>
                    <li>
                        <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF'];?>">
                            <input type = "hidden" name = "id_categorie" value = "3" />
                            <input type = "hidden" name = "categori" value = "supe" />
                            <input type = "submit" name = "supe" value = "Supe" />
                        </form>
                    </li>
                    <li>
                        <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF'];?>">
                            <input type = "hidden" name = "id_categorie" value = "4" />
                            <input type = "hidden" name = "categori" value = "fel-principal" />
                            <input type = "submit" name = "fel-principal" value = "Fel principal" />
                        </form>
                    </li>
                    <li>
                        <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF'];?>">
                            <input type = "hidden" name = "id_categorie" value = "5" />
                            <input type = "hidden" name = "categori" value = "desert" />
                            <input type = "submit" name = "desert" value = "Desert" />
                        </form>
                    </li>
                </ul>
            </div>
        </div>        
    </article>
    <article class="column-2">
        <div class = "indent-right">            
            <?php
            if(isset($_POST) && empty($_POST)){
                echo display_picture('1', 'mic-dejun');
            }
            if(isset($_POST) && !empty($_POST)){
                echo display_picture($_POST['id_categorie'], $_POST['categori']);
            }
            ?>
        </div>
    </article>
    <article class="column-3">
        <div class = "posts">
            <h3>Inscrie-te aici</h3>
            <a href = "inregistrare.php" target = "_parent">
                <button type = "button">Sign up</button>
            </a>
            <p />
            <b>Secretele bucatarului </b>
            <p />
            "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat." <p />"Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
        </div>
    </article>
</div>
</body>

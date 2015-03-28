<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Catering - Mic dejun</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen"> 
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen">
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/cufon-replace.js" type="text/javascript"></script> 
    <script src="js/Dynalight_400.font.js" type="text/javascript"></script>
    <script src="js/FF-cash.js" type="text/javascript"></script>  
    <script src="js/jquery.prettyPhoto.js" type="text/javascript"></script> 
    <script src="js/hover-image.js" type="text/javascript"></script>
    <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>  
    <script src="js/jquery.bxSlider.js" type="text/javascript"></script> 
    <script type="text/javascript">
		$(document).ready(function() {
			$('#slider-2').bxSlider({
				pager: true,
				controls: false,
				moveSlideQty: 1,
				displaySlideQty: 4
			});
			$("a[data-gal^='prettyPhoto']").prettyPhoto({theme:'facebook'});
		}); 
	</script>
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
<body id="page3">
	<!--==============================header=================================-->
    <header>
    	<?php
        include ("header.php");
        include("connect.php");
        ?>
    </header>
    
	<!--==============================content================================-->
    <section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - January 23, 2012!</div>
        <div class="main">
            <div class="container">
            	<h3 class="prev-indent-bot">Desert</h3>
                <div>
                    <?php        
                    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '';
                    $meniu = explode("/", $url);                    
                    $query = mysql_query("SELECT * FROM preparate WHERE id_categorie = '5'");
                    while($row = mysql_fetch_array($query)){
                        echo '<div class="pager" style="width: 240px; float: left; list-style: none;">
                                <div class="p4">
                                    <figure><a class="lightbox-image" href="upload/'.$row['foto'].'" data-gal="prettyPhoto[prettyPhoto]"><img src="upload_thumb/'.$row['foto_thumb'].'" alt="" width = "200" height = "125px"></a></figure>
                                    <h5>'.$row['nume'].'</h5>
                                    <p class="p1">'.$row['ingrediente'].'</p>
                                    <p class="p2"><strong class="color-2">Pret (RON): '.$row['pret'].'</strong></p>
                                    <form action = "comanda-sortiment.php" method = "POST" name = "add_to_cart">
                                        <input type = "hidden" name = "id_preparat" value = "'.$row['id_preparat'].'" />
                                        <input type = "hidden" name = "meniu_type" value = "'.$meniu[4].'" />
                                        <button type = "submit" class="button-1" href="#" name = "add_to_cart_button">Comanda</button>
                                        <input type = "text" size = "5" height="48" name = "bucati" placeholder = "bucati" />
                                    </form>
                                </div>
                              </div>';                            
                    }                          
                    ?>  
                </div>
            </div>
    </section>
    
	<!--==============================footer=================================-->
    <?php
    include ("footer.php");
    ?>
    <!--<script type="text/javascript"> Cufon.now(); </script>-->
</body>
</html>

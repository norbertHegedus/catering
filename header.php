<link rel = "stylesheet" href = "admin_css/administrare.css">
<?php
session_start();
if(!empty($_SESSION)){
    if(isset($_SESSION['username'])){                
        $label1 = 'Comenzi';
        $label2 = 'Administrare site';
        $link = 'administrare.php';
        $user = 'admin.php';
    }
    else {
        $label1 = 'Comanda';
        $label2 = 'Contul meu';
        $link = 'contul-meu.php';
        $user = 'cont.php';
    }
    $log = 'Log Out';
    $log_href = "logout-";
}
else {
    $log = 'Log In';
    $log_href = 'cont.php';
    $user = '';    
    $label1 = 'Comenzi';
    $label2 = 'Contul meu';
    $link = 'contul-meu.php';    
}
echo '  
<div class="row-top">
            <div class="main">            
                <div id = "log_out">
                    <span class = "icon logout"><img src = "admin_images/logout.png" ></span>
                    <span class = "img_text"><a href = "'.$log_href.$user.'">'.$log.'</a></span>
                </div>
                <div id = "back">
                    <span class = "icon back"><img src = "admin_images/back.png"></span>
                    <span class = "img_text"><a href = "index.php">Inapoi</a></span>
                </div>   
                
            	<div class="menu-wrapper">
                    <h1><a href="index.php"><span>PHP</span> Catering</a></h1>                    
                </div>
                <nav>
                    <ul class="menu">
                        <li><a href="comanda.php">'.$label1.'</a></li>
                        <li><a href="#">Meniu</a>
                            <ul>
                                <li><a href="mic-dejun.php">Mic dejun</a></li>
                                <li><a href="salate.php">Salate</a></li>
                                <li><a href="supe.php">Supe</a></li>
                                <li><a href="fel-principal.php">Fel principal</a></li>
                                <li><a href="desert.php">Desert</a></li>
                            </ul>
                        </li>
                        <li><a href="faq.php">FAQs </a></li>
                        <li><a href="'.$link.'">'.$label2.'</a></li>
                        <!--<li><a href="admin.php">Administrare site</a></li>-->
                    </ul>
                </nav>
                <p id = "header_p">Daca aveti nevoie de ajutor,<br> va rugam sunati la numarul de telefon 0746-256-476 (apel netaxabil)</p>
            </div>
        </div>
        <div class="row-bot">
        	<div class="row-bot-bg">
            	<div class="main">
                	<h2><span>Browse and</span> Order</h2>
                        
';

?>


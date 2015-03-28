<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Catering - Admin</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="admin_css/admin.css" />
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
        <?php include('header.php'); ?>
                    
                </div>
            </div>
        </div>
    </header>
    
	<!--==============================content================================-->
    <div id = "section_containter">
    <section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - January 23, 2012!</div>
        <div class="main">
            <div class="container">
            	<h3 class = 'admin_h3'>Contul meu</h3>
               
<?php  //Start the Session
require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['email']) and isset($_POST['password'])){
    //3.1.1 Assigning posted values to variables.
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password=md5($password);
    //3.1.2 Checking the values are existing in the database or not
    $query = "SELECT * FROM `clienti` WHERE email='$email' and parola='$password'";
    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);
    //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 1){
        $_SESSION['email'] = $email;
        header("Location: contul-meu.php");
        exit;
    }else{
        //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "Date autentificare incorecte !";
    }
}
?>
<?php
	if(isset($msg) & !empty($msg)){
		echo $msg;
	}
 ?>
</div>
<div class="register-form-area">
<form action="cont.php" method="POST">
    <p><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-mail :</label>
	<input id="email" type="email" name="email"/></p>
 
     <p><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parola :</label>
	 <input id="password" type="password" name="password"/></p>
 
    <input class="btn register" type="submit" name="submit" value="Autentificare" />
    <a href="inregistrare.php"><button type = "button" class="btn register">Inregistrare</button></a>
    
    </form>
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PHP Catering - Comanda</title>
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
        <script type="text/javascript">
            function validateForm()
            {
            var a=document.forms["reg"]["nume"].value;
            var b=document.forms["reg"]["prenume"].value;
            var c=document.forms["reg"]["adresa"].value;
            var d=document.forms["reg"]["telefon"].value;
            var e=document.forms["reg"]["email"].value;
            var f=document.forms["reg"]["parola"].value;
            if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") && (e==null || e=="") && (f==null || f==""))
              {
              alert("Completati toate campurile");
              return false;
              }
            if (a==null || a=="")
              {
              alert("Nu ai completat numele");
              return false;
              }
            if (b==null || b=="")
              {
              alert("Nu ai completat prenumele");
              return false;
              }
            if (c==null || c=="")
              {
              alert("Nu ai completat adresa");
              return false;
              }
            if (d==null || d=="")
              {
              alert("Nu ai completat telefonul");
              return false;
              }
            if (e==null || e=="")
              {
              alert("Nu ai completat email-ul");
              return false;
              }
            if (f==null || f=="")
              {
              alert("Nu ai completat parola");
              return false;
              }
            }
            </script>
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
                <h3 class = 'admin_h3'>Inregistrare</h3>
                    <ul class="list-1">
                        <div class="register-form-area">
                            <form name="reg" action="inregistrare_exec.php" onsubmit="return validateForm()" method="post">
                                <table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
                                    <tr>
                                        <td colspan="2">
                                            <div align="center">
                                                <!-- Daca un utilizator s-a inregistrat v-a fi redirectionat pe pagina de login -->
                                                <?php
                                                $remarks = isset($_GET['remarks']) ? $_GET['remarks'] : '';
                                                if ($remarks == 'success') {
                                                    sleep(2);
                                                    echo "<script>window.location = 'cont.php'</script>";
                                                }
                                                ?>	
                                            </div></td>
                            </tr>
                            
                            <tr><br>
                                <td width="95"><div align="right">Nume:</div></td>
                                <td width="171"><input type="text" name="nume" /></td>
                            </tr>
                            <tr>
                                <td><div align="right">Prenume:</div></td>
                                <td><input type="text" name="prenume" /></td>
                            </tr>
                            <tr>
                                <td><div align="right">Address:</div></td>
                                <td><input type="text" name="adresa" /></td>
                            </tr>
                            <tr>
                                <td><div align="right">Telefon:</div></td>
                                <td><input type="tel" name="telefon" /></td>
                            </tr>
                            <tr>
                                <td><div align="right">E-mail:</div></td>
                                <td><input type="email" name="email" /></td>
                            </tr>
                            <tr>
                                <td><div align="right">Parola:</div><br></td>
                                <td><input type="password" name="parola" /></td>
                            </tr>
                            <tr>
                                <td><div align="right"></div></td>
                                <td><input class="btn register" name="submit" type="submit" value="Inregistrare" /></td>
                            </tr>
                        </table>
                    </form>
                        </div>


                </ul>
            </div>
        </div>
    </section>
</div>

<!--==============================footer=================================-->
<?php
include ("footer.php");
?>
<script type="text/javascript"> Cufon.now();</script>
</body>
</html>

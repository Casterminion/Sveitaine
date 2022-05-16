<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MPI</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
<body>




<br>



    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <a href="index.php"><img src="logo.png" alt="HTML tutorial" style="width:150px;height: 150px;"></a>
                </a>
            </div>

      
    
            <div class="menu text-left" style=" width: 1300px; margin: auto;">
                <ul>
                    <li>
                        <a href="panaudoti_telefonai.php">Panaudoti telefonai</a>
                    </li>
                    <li>
                        <a href="planai.php">Planai</a>
                    </li>
                    <li>
                        <a href="telefonų_remontas.php">Telefonų remontas</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <li>Sveiki, <?php echo $user_data['Vardas']; ?></li>
                    
                </ul>
            </div>
    
            <div class="clearfix"></div>
        </div>
    </section>
    <hr>
    <div class="image1">
        <img  src="background1.jpg" width="460" height="345">>
    </div>
    <!-- Navbar Section Ends Here -->


<div>
    <img src="back.png" alt="">
    <div class="header">
        <h2 style="text-align: center;text-align: center; font-size: 60px;">Sveiki atvyke į MPI!</h2>
    </div>
    <br>

  

      <!--Header section-->
<div class="header-section">
	<!--Navigation section-->
	<ul class="navigation">
        <h2 >Taigi kas gi yra MPI?</h2>
        <br>
        <div><p style="text-align: left;font-size: 30px;">     MPI tai mobiliųjų paslaugų įmonė, suteikianti ne tik įvairias <br>paslaugas kaip sąskaitos papildimas, telefonų 
            remontas,<br> bet taip pat ir superka senus telfonus sažiningomis kainomis, <br>bei suteikia galimybę įsigyti įvairiausių planų kurie neturi  galiojimo <br>laiko</p>      
            </div>
	</ul>
	<!--Social Icons-->
	<img src="intro.jpg">
</div>
</div>
<br>


<article class="browser">
    <h2 style="color:rgb(255, 255, 255)">Microsoft Edge</h2>
  </article>
</article>


<footer>
  <p>Autorius: Arijus Blavieščiūnas<br>
  <a href="a">arijus.bla574@go.kauko.lt</a></p>
</footer>
    </body>
    </html>
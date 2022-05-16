<?php
session_start();

include("connection.php");
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    
    //something posted
    $Telefono_numeris = $_POST['Telefono_numeris'];
    $Slaptazodis = $_POST['Slaptazodis'];

    if(!empty($Telefono_numeris) && !empty($Slaptazodis) &&  is_numeric($Telefono_numeris))
    {

        //read from database
        $query = "select * from registracija where Telefono_numeris = '$Telefono_numeris' limit 1";

        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
    
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['Slaptazodis'] === $Slaptazodis)
                {
                    $_SESSION['Registration_ID'] = $user_data['Registration_ID'];
                    header("Location: index.php");
                    die;
            
                }
            }
        }
        echo "Wrong number or password";
    }
    else
    {
        echo "Please enter some valid information!";
    }
}


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
<br>
<br>
<br>
<br>


    <div>
    <img src="logo.png" alt="HTML5 Icon" style="width:245px;height:245; float:left; margin: -110px 50px">
    <p style="text-align: center;font-size: 50px; margin: -10px 300px">Prisijungimas</p>
    </div>
    <br>
    <br>
    
    
<div class="container">
        <form method="post">
            <div style="font-size: 20px; margin: 10px; color: white;">Prisijungimas</div>


            <input id="text" type="text" name="Telefono_numeris" placeholder="Įveskite telefono numerį" required><b>Telefono numeris</b><br><br>
            <input id="text" type="password" name="Slaptazodis"  placeholder="Įveskite slaptažodį"  required><b>Slaptažodis</b><br><br>


            <button id="button" type="submit" value="Login">Prisijungti</button><br><br>

            <a href="signup.php">Neturite prisijungimo?</a><br><br>
        </form>
    </div>



    <br>
    <br>
    <br>
    <br>
   
    <br>
    <br>
   
    <br>
    <br>
   
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  <article class="browser">
    <h2 style="color:white">Microsoft Edge</h2>
  </article>
</article>

<footer>
  <p>Autorius: Arijus Blavieščiūnas<br>
  <a href="a">arijus.bla574@go.kauko.lt</a></p>
</footer>

    </body>
    </html>
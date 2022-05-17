<?php

require __DIR__.'/PHPMailer/src/Exception.php';
require __DIR__.'/PHPMailer/src/PHPMailer.php';
require __DIR__.'/PHPMailer/src/SMTP.php';

# use "use" after include or require

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__.'/vendor\autoload.php';

$mail = new PHPMailer(true);


session_start();


    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        
        //something posted
        $Vardas = $_POST['Vardas'];
        $Pavardė = $_POST['Pavardė'];
        $Telefono_numeris = $_POST['Telefono_numeris'];
        $El_paštas = $_POST['El_paštas'];
        $hashToStoreInDb = password_hash($_POST['Slaptazodis'], PASSWORD_DEFAULT);




        if(!empty($Vardas) && !empty($Pavardė) && !empty($Telefono_numeris) && !empty($El_paštas) && !empty($hashToStoreInDb) && 
        !is_numeric($Vardas) && !is_numeric($Pavardė) && is_numeric($Telefono_numeris))
        {

            //save to database
            $Registration_ID = random_num(20);
            $query = "insert into registracija ( Registration_ID, Vardas, Pavardė, Telefono_numeris, El_paštas, Slaptazodis) values ( '$Registration_ID','$Vardas' , '$Pavardė' ,'$Telefono_numeris','$El_paštas' ,'$hashToStoreInDb')";
            
            mysqli_query($con, $query);

            
            


//Server settings
$mail->SMTPDebug = 0;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'arturasssxvccx@gmail.com';                     //SMTP username
$mail->Password   = 'arturasssxvccx123';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom('arturasssxvccx@gmail.com', 'arturasssxvccx@gmail.com');
$mail->addAddress($El_paštas, $Vardas);     //Add a recipient        

//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Sveiki Prisijunge prie MPI';
$mail->Body    = '<H1><b>Registracija sekminga</b></H1>';
$mail->AltBody = 'Registracija sekminga';

$mail->send();
header("Location: login.php");
 
            die;


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
    <p style="text-align: center;font-size: 50px; margin: -10px 300px">Registracija</p>
    </div>
    <br>
    <br>

    <!-- Form starts there -->
    <div class="container">
        <form method="post">
           

            <input id="text" type="text" name="Vardas" placeholder="Įveskite vardą"  required><b>Vardas</b><br><br>
            <input id="text" type="text" name="Pavardė" placeholder="Įveskite pavardę" required><b>Pavardė</b><br><br>
            <input id="text" type="text" name="Telefono_numeris" placeholder="Įveskite telefono numerį" required><b>Telefono numeris</b><br><br>
            <input id="text" type="text" name="El_paštas" placeholder="Įveskite elektroninį paštą" required><b>Elektroninis paštas</b><br><br>
            <input id="text" type="password" name="Slaptazodis"  placeholder="Įveskite slaptažodį"  required><b>Slaptažodis</b><br><br>




            <button id="button" type="submit" value="register" name="register">Registruotis</button><br><br>

            <a href="login.php">Turite prisijungimą?</a><br><br>
           
        </form>
    </div>
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
<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

//DIsplay
$tableName="panaudoti_telefonai";
$columns= ['Panaudoti_telefonai_id','Paslaugos','Telefono_pavadinimas','Kaina_pirkimo','Kaina_pardavimo'];
$fetchData = fetch_data($con, $tableName, $columns);

function fetch_data($con, $tableName, $columns){
 if(empty($con)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName";
$result = $con->query($query);

if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($con);
}
}
return $msg;
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />


</head>
<body>




<br>



    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container1">
            <div class="logo">
                <a href="#" title="Logo">
                    <a href="index.php"><img src="logo.png" alt="HTML tutorial" style="width:150px;height: 150px;"></a>
                </a>
            </div>

      
    
            <div class="menu text-left" style=" width: 1500px; margin: auto; color:black;">
                <ul>
                    <li>
                        <a href="panaudoti_telefonai.php" style="color:black;">Panaudoti telefonai</a>
                    </li>
                    <li>
                        <a href="planai.php"style="color:black;">Planai</a>
                    </li>
                    <li>
                        <a href="telefonų_remontas.php"style="color:black;">Telefonų remontas</a>
                    </li>
                    <li>
                        <a href="logout.php" style="color:black;">Logout</a>
                    </li>
                    <li>Sveiki, <?php echo $user_data['Vardas']; ?></li>
                    
                </ul>
            </div>
    
            <div class="clearfix"></div>
        </div>
    </section>
    <hr>
    <div class="image1">
        <img  src="background1.jpg" width="500" height="400">
    </div>
    <!-- Navbar Section Ends Here -->

    <!--paieska-->
  

  <div class="container">
    <div class="input-group">
     <input type="text" name="search_text" id="search_text" placeholder="Paieška" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>

  <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"panaudotiTelefonaiPaieska.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<br>
<br>
<br>
<br>
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
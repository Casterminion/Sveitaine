<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

//DIsplay
$tableName="telefonų_remontas";
$columns= ['Telefonų_remontas_ID', 'Paslaugos','Remonto_pavadinimas','Kaina'];
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
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY Telefonų_remontas_ID DESC";
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


<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <?php echo $deleteMsg??''; ?>
    <div class="table-responsive">
      <table class="table table-bordered" style=" border-collapse: collapse;">
         <th>Remonto_pavadinimas</th>
         <th>Kaina</th>
    </thead>
    <tbody>
  <?php
      if(is_array($fetchData)){      
      $sn=1;
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><?php echo $data['Remonto_pavadinimas']??''; ?></td>
      <td><?php echo $data['Kaina']??''; ?></td>
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetchData; ?>
  </td>
    <tr>
    <?php
    }?>
    </tbody>
     </table>
   </div>
</div>
</div>
</div>



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
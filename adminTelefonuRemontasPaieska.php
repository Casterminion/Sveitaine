




<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "kursinis projektas");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM telefonų_remontas 
  WHERE Telefonų_remontas_ID   LIKE '%".$search."%'
  OR Paslaugos LIKE '%".$search."%' 
  OR Remonto_pavadinimas LIKE '%".$search."%' 
  OR Kaina LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM telefonų_remontas ORDER BY Telefonų_remontas_ID  
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Telefonų_remontas_ID </th>
     <th>Paslaugos</th>
     <th>Remonto_pavadinimas</th>
     <th>Kaina</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Telefonų_remontas_ID"].'</td>
    <td>'.$row["Paslaugos"].'</td>
    <td>'.$row["Remonto_pavadinimas"].'</td>
    <td>'.$row["Kaina"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Duomenis nerasti';
}

?>
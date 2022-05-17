<?php
//fetch.php
$connect = mysqli_connect("localhost","root","","kursinis projektas");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM panaudoti_telefonai 
  WHERE Telefono_pavadinimas LIKE '%".$search."%' 
  OR Kaina_pardavimo LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM panaudoti_telefonai ORDER BY Panaudoti_telefonai_id 
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Telefono pavadinimas</th>
     <th>Kaina</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Telefono_pavadinimas"].'</td>
    <td>'.$row["Kaina_pardavimo"].'</td>
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
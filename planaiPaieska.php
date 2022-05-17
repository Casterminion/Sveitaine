<?php
//fetch.php
$connect = mysqli_connect("localhost","root","","kursinis projektas");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM planas 
  WHERE Pavadinimas LIKE '%".$search."%' 
  OR Kaina LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM planas ORDER BY Planas_ID  
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Pavadinimas</th>
     <th>Kaina</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Pavadinimas"].'</td>
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
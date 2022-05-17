
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "kursinis projektas");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM paslaugos 
  WHERE Paslaugu_id LIKE '%".$search."%' 
  OR Planas  LIKE '%".$search."%' 
  OR Panaudoti_telefonai  LIKE '%".$search."%' 
  OR Telefonu_remontas  LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM paslaugos ORDER BY Paslaugu_id  
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Paslaugu_id </th>
     <th>Planas </th>
     <th>Panaudoti_telefonai </th>
     <th>Telefonu_remontas </th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Paslaugu_id"].'</td>
    <td>'.$row["Planas"].'</td>
    <td>'.$row["Panaudoti_telefonai"].'</td>
    <td>'.$row["Telefonu_remontas"].'</td>
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
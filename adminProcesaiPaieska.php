<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "kursinis projektas");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM procesai
  WHERE Suteiktu_paslaugu_id LIKE '%".$search."%'
  OR user_id  LIKE '%".$search."%' 
  OR uzsakimo_data LIKE '%".$search."%' 
  OR uzsakimo_baigimosi_data LIKE '%".$search."%' 
  OR suteikta_paslauga_id  LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM procesai ORDER BY Suteiktu_paslaugu_id  
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Suteiktu_paslaugu_id </th>
     <th>user_id </th>
     <th>uzsakimo_data</th>
     <th>uzsakimo_baigimosi_data</th>
     <th>suteikta_paslauga_id </th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Suteiktu_paslaugu_id"].'</td>
    <td>'.$row["user_id"].'</td>
    <td>'.$row["uzsakimo_data"].'</td>
    <td>'.$row["uzsakimo_baigimosi_data"].'</td>
    <td>'.$row["suteikta_paslauga_id"].'</td>
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
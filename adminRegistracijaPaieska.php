
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "kursinis projektas");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM registracija 
  WHERE Registration_ID   LIKE '%".$search."%'
  OR Vardas LIKE '%".$search."%' 
  OR Pavardė LIKE '%".$search."%' 
  OR Telefono_numeris LIKE '%".$search."%' 
  OR El_paštas LIKE '%".$search."%'
  OR Slaptazodis LIKE '%".$search."%'
  OR usertype LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM registracija ORDER BY Registration_ID  
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Registration_ID </th>
     <th>Vardas</th>
     <th>Pavardė</th>
     <th>Telefono_numeris</th>
     <th>El_paštas</th>
     <th>Slaptazodis</th>
     <th>usertype</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Registration_ID"].'</td>
    <td>'.$row["Vardas"].'</td>
    <td>'.$row["Pavardė"].'</td>
    <td>'.$row["Telefono_numeris"].'</td>
    <td>'.$row["El_paštas"].'</td>
    <td>'.$row["Slaptazodis"].'</td>
    <td>'.$row["usertype"].'</td>
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
<?php
$servername="localhost";
$username = "root";
$password = "";
$database = "kursinis projektas";


//Database connection
$conn = mysqli_connect($servername, $username, $password, $database);




if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
}
else{

    
    $Vardas = $_POST['Vardas'];
    $Pavardė = $_POST['Pavardė'];
    $Telefono_numeris = $_POST['Telefono_numeris'];
    $El_paštas = $_POST['El_paštas'];
    $Slaptazodis = $_POST['Slaptazodis'];



    $stmt = $conn->prepare("insert into registraton(Vardas, Pavardė, Telefono_numeris, El_paštas, Slaptazodis)
    values(?, ?, ? ,?, ?)");
    $stmt->bind_param("ssiss", $Vardas, $Pavardė, $Telefono_numeris, $El_paštas, $Slaptazodis);
    $stmt->execute();
    echo "registration Successfully...";
    $stmt->close();
    $conn->close();
}

?>

<?php   

$servername =  "localhost";
$username   =  "root";
$password   =  "";
$db_name =  "ajax";

$conn = new mysqli($servername, $username, $password, $db_name);

if($conn->connect_error){
     die("Connection failed :" . $conn->connect_error);
}


$fetch = "SELECT * from user";
$fetch  = $conn->query($fetch);
$result = [];

if( $fetch->num_rows > 0){
    while($rows = $fetch->fetch_assoc()){
    $result[] = $rows;

    }
}

$conn->close(); 

echo json_encode($result);


?>

  


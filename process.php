<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
   
    // TODO: Validate and sanitize data as needed before inserting into the database

    // Insert data into the database (example assuming you have a MySQL database)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ajax";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO user (name, email) VALUES ('$name', '$email')";
     
    if ($conn->query($sql) === TRUE) {
      //  echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

 // Fetch data from the database
 $sql = "SELECT * FROM user";
 $result = $conn->query($sql);
 $data = [];

 if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
         $data[] = $row;
     }
 }

 // Close the database connection
 $conn->close();

 // Send the fetched data back to the AJAX request
 echo json_encode($data);}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "coding_bootcamp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO php_form_project (firstname, lastname, email)
VALUES ('{$_POST["firstname"]}','{$_POST["lastname"]}','{$_POST["email"]}')";

if (mysqli_query($conn, $sql)) {
  header("location:index.php?message=add_user&firstname={$_POST['firstname']}&lastname={$_POST['lastname']}");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
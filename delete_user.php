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

$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
// sql to delete a record
$sql = "DELETE FROM php_form_project WHERE id= '{$_POST["delete_btn"]}'";

if (mysqli_query($conn, $sql)) {
  header("location:index.php?message=delete_user&firstname=$firstname&lastname=$lastname");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
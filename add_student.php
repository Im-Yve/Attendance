<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $year_level = $_POST['year_level'];
  $course = $_POST['course'];

  $sql = "INSERT INTO students (fname, lname, year_level, course) 
  VALUES ('$fname', '$lname', '$year_level', '$course')";

  $conn->query($sql);


  header("Location: index.php");
  exit;
}
?>
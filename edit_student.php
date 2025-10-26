<?php
include 'connection.php';
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $year_level = $_POST['year_level'];
  $course = $_POST['course'];

  $update_sql = "UPDATE students 
  SET fname = '$fname', 
      lname = '$lname', 
      year_level = '$year_level', 
      course = '$course' 
  WHERE id = $id";

$conn->query($update_sql);

header("Location: index.php");
exit;

}

$student = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
</head>
<body>
  <h2>Edit Student</h2>
  <form method="POST">
    <label>First Name:</label>
    <input type="text" name="fname" value="<?= $student['fname'] ?>" required>

    <label>Last Name:</label>
    <input type="text" name="lname" value="<?= $student['lname'] ?>" required>

    <label>Year Level:</label>
    <select name="year_level" required>
      <?php
      $levels = ['1st Year','2nd Year','3rd Year','4th Year'];
      foreach ($levels as $lvl) {
        $sel = ($lvl == $student['year_level']) ? 'selected' : '';
        echo "<option $sel>$lvl</option>";
      }
      ?>
    </select>

    <label>Course:</label>
    <select name="course" required>
      <?php
      $courses = ['BSIT','BSCS','BSECE','BSBA','BSED'];
      foreach ($courses as $c) {
        $sel = ($c == $student['course']) ? 'selected' : '';
        echo "<option $sel>$c</option>";
      }
      ?>
    </select>

    <button type="submit">Update</button>
  </form>
</body>
</html>

<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Student Attendance</h2>

    <form action="add_student.php" method="POST">
        <label for="">First Name: </label>
        <input type="text" name="fname" id="fname" required>

        <label for="">Last Name: </label>
        <input type="text" name="lname" id="lname" required>

        <label>Year Level:</label>
        <select name="year_level" required>
            <option value="">-- Select Year Level --</option>
            <option value="1st Year">1st Year</option>
            <option value="2nd Year">2nd Year</option>
            <option value="3rd Year">3rd Year</option>
            <option value="4th Year">4th Year</option>
        </select>

	<label>Course:</label>
		<select name="course" required>
    		<option value="">-- Select Course --</option>
    		<option value="IT">Information Technology</option>
    		<option value="HR">Human Resources</option>
    		<option value="EDUC">Education</option>
    		<option value="ACC">Accountancy</option>
	</select>


        <button type="submit">Add Student</button>
    </form>

    <table>

        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Year Level</th>
            <th>Course</th>
            <th>Action</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM students ORDER BY lname ASC");
        if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['year_level']; ?></td>
                    <td><?php echo $row['course']; ?></td>
                    <td>

                        <a href="edit_student.php?id=<?= $row['id'] ?>" class="edit">Edit</a>
                        <a href="delete_student.php?id=<?= $row['id'] ?>" class="delete"
                            onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; else: ?>
            <tr>
                <td colspan="5">No students found.</td>
            </tr>
        <?php endif; ?>

    </table>
</body>

</html>

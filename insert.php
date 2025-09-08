<?php
// Database connection details
$host = "localhost";       // usually "localhost"
$user = "root";            // your MySQL username
$password = "";            // your MySQL password (empty by default in XAMPP)
$database = "student_study_planner"; // database name

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$subject = $_POST['subject'];
$task = $_POST['task'];
$due_date = $_POST['due_date'];

// Insert into database
$sql = "INSERT INTO tasks (subject, task, due_date) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $subject, $task, $due_date);

if ($stmt->execute()) {
    echo "<h2>Task Added Successfully!</h2>";
    echo "<a href='index1.html'>Go Back</a>";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>

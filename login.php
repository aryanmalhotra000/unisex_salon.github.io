<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>

<h2>Login</h2>

<form method="post" action="login.php">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost"; // Change this if your database is on a different server
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "logindata"; // Change this to your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // You should hash passwords in a real application
    $sql = "SELECT * FROM users WHERE username='$enteredUsername' AND password='$enteredPassword'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        echo "Login successful";
        // Redirect to a different page after successful login
        // header("Location: welcome.php");
    } else {
        echo "Invalid username or password";
    }

    $conn->close();
}
?>

</body>
</html>

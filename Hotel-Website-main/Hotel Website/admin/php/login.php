<?php
  // Connect to the MySQL database
  include("dataconnection.php");

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        // Check if the username and password match a row in the database
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) == 1) {
        // Login successful
        session_start();
        $_SESSION['username'] = $username;
        header('location: ../admin.html');
        } else {
        // Login failed
        echo "Incorrect username or password.";
        }
    }
?>
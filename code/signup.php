<?php

require_once "db_query/db_query.php";

session_start();

// Get the user's name and password from the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];

        // Save the user's name and password to the database
        $values = array($name, $password);
        $re = InsertIntoDatabase("login", "name, password", $values);

        header("Location: ./login");
        exit;

        // $query = "INSERT INTO log (name, password) VALUES ('$name', '$password')";
        // if (mysqli_query($connection, $query)) {
        //     echo "User's name and password saved to the database.";
        // } else {
        //     echo "Error: " . mysqli_error($connection);
        // }
    }
}
?>

<selection>

<form action="./signup" method="POST">
    <label for="name">Username:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Sign Up">
</form>

</selection>

<a href="./login">Log In</a>
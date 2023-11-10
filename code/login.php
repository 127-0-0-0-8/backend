<?php

require_once "db_query/db_query.php";
require_once "captcha/checkCaptcha.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["password"]) || empty($_POST["captcha"])) {
        echo "Please enter username, password and captcha.";
    } else {
        $validator = new CaptchaValidator();
        [$isValid, $status] = $validator->validate($_SESSION['captcha'], $_POST['captcha']);
        if ($isValid === false) {
            echo $status;
        } else {
            $name = $_POST["name"];
            $password = $_POST["password"];
    
            $result = SelectFromDatabase("login", "name, password", "name='$name' and password='$password'");
    
            if ($result && $result->rowCount() > 0) {
                // while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
                //     echo "Login success! Username: " . $row["name"] . " / Password: " . $row["password"] . "<br>";
                // }
                $_SESSION['isLoggedIn'] = true;
                $_SESSION["name"] = $name;
                header("Location: ./todo");
                exit;
            } else {
                echo "No matching records found.";
            }

            // while ($row = $result->fetch_assoc()) {
            //     echo $row["name"] . " -> " . $row["password"] . "<br>";
            // }
            // if ($result->num_rows > 0) {
            //     $_SESSION['isLoggedIn'] = true;
            // }
        }
    }
}
?>

<form action="./login" method="POST">
    <label for="name">Username:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br>
    <?php require_once "./captcha/captchaForm.php" ?>
    <input type="submit" value="Log In">
</form>

<a href="./signup">Signup</a>
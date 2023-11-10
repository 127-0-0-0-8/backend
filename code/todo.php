<?php

require_once "db_query/db_query.php";

session_start();

// 檢查登入狀態
if (isset($_SESSION["isLoggedIn"]) === false || $_SESSION["isLoggedIn"] === false || isset($_SESSION["name"]) === false) {
    header("Location: ./login");
    exit;
}

// 新增代辦事項
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["text"])) {
        $text = array($_SESSION["name"], $_POST["text"]);
        InsertIntoDatabase("todo", "name, text", $text);
        header("Location: ./todo");
    }
}

// 取得代辦事項
$name = $_SESSION["name"];
echo '<h2>' . $name . '</h2>';
$result = SelectFromDatabase("todo", "text", "name = '$name'");
if ($result && $result->rowCount() > 0) {
    while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
        echo $row["text"] . "<br>";
    }
}
?>

<br>
<form action="./todo" method="POST">
    <label for="text">Text:</label>
    <input type="text" id="text" name="text" required><br><br>
    <input type="submit" value="Submit">
</form>

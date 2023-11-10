<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // 启动会话
    session_start();

    // 销毁所有会话变量
    session_unset();

    // 销毁会话
    session_destroy();

    header("Location: ./login");
    exit;
}
?>

<form action="./logout" method="POST">
    <input type="submit" value="Submit">
</form>
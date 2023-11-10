<?php

function DbInit()
{
    $dbms = "mysql";
    // $host = "mysql-server.code.orb.local";
    $host = "mysql1.orb.local";
    $username = "root";
    $password = "12345678";
    $dbname = "test";
    $dsn="$dbms:host=$host;dbname=$dbname";

    $connection = new \PDO($dsn, $username, $password);
    // 設定錯誤屬性
    $connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    
    return $connection;


    // 建立資料庫的連線
    // $connection = new mysqli($host, $username, $password, $dbname);

    // 檢查連線狀態
    // if ($connection->connect_error) {
    //     die("Error: " . $connection->connect_error);
    // }
}
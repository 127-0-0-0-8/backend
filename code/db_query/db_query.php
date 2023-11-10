<?php

require_once "db_connection.php";

function ValueToString($values)
{
    $valueString = "";
    foreach ($values as $value) {
        // $valueString .= "'" . mysqli_real_escape_string($connection, $value) . "', ";
        $valueString .= "'" . $value . "', ";
    }
    $valueString = rtrim($valueString, ", ");  // 移除最後的逗號和空格
    return $valueString;
}

function SelectFromDatabase($table, $columns, $condition="True")
{
    // global $connection;
    $connection = DbInit();

    $stmt = $connection->prepare("SELECT $columns FROM $table WHERE $condition");
    $stmt->execute();
    $stmt->setFetchMode(\PDO::FETCH_ASSOC);
    $connection = null;

    return $stmt;

    // if ($condition === "True") {
    //     $query = "SELECT $columns FROM $table";
    // } else {
    //     $query = "SELECT $columns FROM $table WHERE $condition";
    // }

    // $result = mysqli_query($connection, $query);

    // if ($result) {
    //     return $result;
    // } else {
    //     echo "Error: " . mysqli_error($connection);
    //     return false;
    // }
}

function InsertIntoDatabase($table, $columns, $values)
{
    // global $connection;
    $connection = DbInit();

    $valueString = ValueToString($values);
    $query = "INSERT INTO $table ($columns) VALUES ($valueString)";
    $stmt= $connection->prepare($query);
    $stmt->execute();
    $connection = null;
    return $stmt;


    // $query = "INSERT INTO $table ($columns) VALUES ($valueString)";
    // $result = mysqli_query($connection, $query);

    // if ($result) {
    //     echo "Data inserted successfully.";
    //     return true;
    // } else {
    //     echo "Error: " . mysqli_error($connection);
    //     return false;
    // }

}
<?php
session_start();
include'db_connect.php';

$id = $_GET["id"];
pagedel($id);
header ("location: clients.php");

function pagedel($id){    // функция удаления страниц
    $sql = "DELETE FROM users WHERE id=$id";
    mysql_query($sql) or die (mysql_error());
}

?>
<?php
session_start();
$id =  $_SESSION["id"];

$login = $_POST['oldlogin'];
$new_login = $_POST['newlogin'];
$new_login2 = $_POST['repeatnewlogin'];
$link = new mysqli('localhost', 'root', 'mysql', 'mybd');

$result = mysqli_query($link, "SELECT * FROM `users` WHERE id=$id");
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$login_old = $row["login"];
if ($login == $login_old) {
    if ($new_login == $new_login2) {
        $result = mysqli_query(
            $link,
            "UPDATE `users` SET `login`='$new_login' WHERE id=$id"
        );
    } 
} 
$link->close();

header('Location: admin.php');

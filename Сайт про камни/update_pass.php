<?php
session_start();
$id =  $_SESSION["id"];

$pass = $_POST['oldpass'];
$new_pass = $_POST['newpass'];
$new_pass2 = $_POST['repeatnewpass'];
$link = new mysqli('localhost', 'root', 'mysql', 'mybd');

$result = mysqli_query($link, "SELECT * FROM `users` WHERE id=$id");
$row = mysqli_fetch_array($result, MYSQLI_BOTH);
$password = $row["pass"];
if ($pass == $password) {
    if ($new_pass == $new_pass2) {
        $result = mysqli_query(
            $link,
            "UPDATE `users` SET `pass`='$new_pass' WHERE id=$id"
        );
    } 
}

$link->close();

header('Location: admin.php');

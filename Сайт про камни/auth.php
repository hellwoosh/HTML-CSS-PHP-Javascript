<?php
session_start();
$link = new mysqli('localhost', 'root', 'mysql', 'mybd');
if ($link) { 

        
            $login = $_POST["login"];
            $pass = $_POST["pass"];
            echo $login;
            echo $pass;
            $result = mysqli_query($link, "SELECT * FROM `users` WHERE login = '$login' AND pass = '$pass'");
            if (!$result) {
                echo "Не удалось получить данные из таблицы<br>";
            } else {
                $count = mysqli_num_rows($result);
                echo $count;
                if ($count == 1) {
                    $_SESSION["login"] = $login;
                    $row = mysqli_fetch_array($result);
                    $_SESSION["id"] = $row["id"];
                    header('Location: admin.php');
                } else {
                    $_SESSION["entrance"] = false;
                    header('Location: index.php');
                }
            }
        
    
    mysqli_close($link);
} else {
    echo ("Не получилось подключиться к бд<br>");
}




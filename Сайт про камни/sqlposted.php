<?php
    $namenewsp = $_POST["namenewsp"];
    $pathnawsp = $_POST["pathnawsp"];
    $textnawsp = $_POST["textnawsp"];
    
    $link = new mysqli('localhost', 'root', 'mysql', 'mybd');
    if ($link) {
       
            $result = mysqli_multi_query($link,    "
            INSERT INTO `news`(`title`, `image`, `text`) VALUES ('$namenewsp','$pathnawsp','$textnawsp')");
            if (!$result) {
                echo "Не удалось получить данные из таблицы<br>";
            }
       
        mysqli_close($link);
        }
    header( "Location: admin.php" );
    ?>
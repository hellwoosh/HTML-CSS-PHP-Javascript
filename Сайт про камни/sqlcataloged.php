<?php
    $namecatalogp = $_POST["namecatalogp"];
    $pathcatalogp = $_POST["pathcatalogp"];
    $pricecatalogp = $_POST["pricecatalogp"];
    
    $link = new mysqli('localhost', 'root', 'mysql', 'mybd');
    if ($link) {
       
            $result = mysqli_multi_query($link,    "
            INSERT INTO `catalog`(`title`, `image`, `price`) VALUES ('$namecatalogp','$pathcatalogp','$pricecatalogp')");
            if (!$result) {
                echo "Не удалось получить данные из таблицы<br>";
            }
       
        mysqli_close($link);
        }
    header( "Location: admin.php" );
    ?>
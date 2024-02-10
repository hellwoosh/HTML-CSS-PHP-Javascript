<?php 
        $ID = $_POST["idnameddel"];
        $link = new mysqli('localhost', 'root', 'mysql', 'mybd');
        if ($link) 
        {
           
				$result = mysqli_multi_query($link,	"
				DELETE FROM catalog WHERE ID = $ID");
                if (!$result)
                {
                    echo "Не удалось получить данные из таблицы<br>";
                }
           
            mysqli_close($link);
        }
        
        header( "Location: admin.php" );
    ?>

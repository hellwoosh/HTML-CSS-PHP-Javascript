<?php 
        $ID = $_POST["idname"];
		$namenews = $_POST["namenews"];
		$pathnews = $_POST["pathnews"];
        $textnews = $_POST["textnews"];
        $link = new mysqli('localhost', 'root', 'mysql', 'mybd');
        if ($link) 
        {
            
				$result = mysqli_multi_query($link,	"
				UPDATE news SET title = '$namenews', image = '$pathnews', text = '$textnews' WHERE id = $ID");
                if (!$result)
                {
                   echo "Не удалось получить данные из таблицы<br>";
                }
            
            mysqli_close($link);
        }
        
        header( "Location: admin.php" );
    ?>
<?php 
        $ID = $_POST["idname"];
		$namecatalog = $_POST["namecatalog"];
		$pathcatalog = $_POST["pathcatalog"];
        $pricecatalog = $_POST["pricecatalog"];
        $link = new mysqli('localhost', 'root', 'mysql', 'mybd');
        if ($link) 
        {
            
				$result = mysqli_multi_query($link,	"
				UPDATE catalog SET title = '$namecatalog', image = '$pathcatalog', price = '$pricecatalog' WHERE id = $ID");
                if (!$result)
                {
                   echo "Не удалось получить данные из таблицы<br>";
                }
            
            mysqli_close($link);
        }
        
        header( "Location: admin.php" );
    ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="resetpass">
            <h2 class="resetpass__title">Смена пароля</h2>
            <form class="resetpass__form" action="update_pass.php" method="POST">

                <div class="resetpass__text">
                    <label for="oldpass">Старый пароль</label>
                    <input type="password" placeholder="" name="oldpass" id="oldpass">
                </div>

                <div class="resetpass__text">
                    <label for="newpass">Новый пароль</label>
                    <input type="password" placeholder="" name="newpass" id="newpass">
                </div>

                <div class="resetpass__text">
                    <label for="repeatnewpass">Повторить новый пароль</label>
                    <input type="password" placeholder="" name="repeatnewpass" id="repeatnewpass">
                </div>
                <button type="submit">Подтвердить</button>

            </form>
        </div>
        <div class="resetpass">
            <h2 class="resetpass__title">Смена логина</h2>
            <form class="resetpass__form" action="update_login.php" method="POST">

                <div class="resetpass__text">
                    <label for="oldlogin">Старый логин</label>
                    <input type="password" placeholder="" name="oldlogin" id="oldlogin">
                </div>

                <div class="resetpass__text">
                    <label for="newlogin">Новый логин</label>
                    <input type="password" placeholder="" name="newlogin" id="newlogin">
                </div>

                <div class="resetpass__text">
                    <label for="repeatnewlogin">Повторить новый логин</label>
                    <input type="password" placeholder="" name="repeatnewlogin" id="repeatnewlogin">
                </div>                  

                <button type="submit">Подтвердить</button>
            </form>
        </div>
    </div>  
    <div class="container">
        <!-- НОВОСТИ -->
        <?php
            $link = new mysqli('localhost', 'root', 'mysql', 'mybd');
            if ($link) {        
                $id =  $_SESSION["id"];
                $result = mysqli_query($link, " 
                    SELECT *
                    FROM news");
                if (!$result) {
                    echo "Не удалось получить данные из таблицы<br>";
                }

            mysqli_close($link);
            }
        ?>
            <div class="quest__list">
                    <div style="height:7%; width:100%; ">
                        <h3 class="stat__title">Список новостей</h3>
                        <button style="margin-left: 0px" onclick="ModalAddendum(2)">
                            Добавить
                        </button>
                    </div>

                    <?php
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                        <div class="question_update">
                            <p style="width: 50%;display: flex;align-items: center;" id="<?php echo $row["id"]; ?>">
                                <?php echo $row["title"]; ?>
                    </p>
                            <div class="d" ><button style="margin-top: 10px;margin-bottom: 10px;" onclick='ModalEdit( <?php echo $row["id"];
                                                                        echo ", `{$row["title"]}`";
                                                                        echo ", `{$row["image"]}`";
                                                                        echo ", `{$row["text"]}`" ?> )'>
                                    Редактировать
                                </button>
                                <button style="margin-top: 10px;margin-bottom: 10px;" onclick='ModalDelete( <?php echo $row["id"];
                                                                echo ", `{$row["title"]}`" ?> )'>
                                    Удалить
                                </button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="ModalBG ModalBG1 hidden">
                    <div class="ModalAddendum2">
                        <form method="post" action="sqlpostup.php">
                            <p style="font-size: 30px;font-weight: 700;text-align: center;color: #0F2232;">Редактирование новости</p>
                            <p style="color: #0F2232;padding-left: 10%">Название новости
                                <input id="namenews1" name="namenews" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                            </p>
                            <p style="color: #0F2232;padding-left: 10%">Путь до изображения
                                <input id="pathnews1" name="pathnews" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                            </p>
                            <p style="color: #0F2232;padding-left: 10%">Текст новости
                                <input id="textnews1" name="textnews" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                            </p>
                            <p style="color: #0F2232;padding-left: 10%;display: none">id
                                <input id="idnumber" name="idname" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                            </p>
                            <div style=" width: 700px;" class="button_some">
                                <button name="savet" type="submit" onclick="ModalAddendum(1 )">Сохранить</button>
                                <button type="reset" onclick="ModalAddendum(1)">Отмена</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="ModalBG ModalBG2 hidden">
                <div class="ModalAddendum3">
                    <form method="post" action="sqlposted.php">
                        <p style="font-size: 30px;font-weight: 700;text-align: center;color: #0F2232;">Добавление новости</p>
                        <p style="color: #0F2232;padding-left: 10%">Название новости
                            <input id="namenewsp" name="namenewsp" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                        </p>

                        <p style="color: #0F2232;padding-left: 10%">Путь до изображения
                            <input id="pathnewsp" name="pathnawsp" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                        </p>
                        <p style="color: #0F2232;padding-left: 10%">Текст новости
                            <input id="textnewsp" name="textnawsp" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                        </p>
                        <p style="color: #0F2232;padding-left: 10%;display: none">id
                            <input id="idnumberp" name="idnamep" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                        </p>
                        <div style=" width: 700px;" class="button_some">
                            <button name="insertt" type="submit" onclick="ModalAddendum(2)">Добавить</button>
                            <button type="reset" onclick="ModalAddendum(2)">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ModalBG ModalBG3 hidden">
                <div class="modalAuth">
                    <form method="post" action="sqlpostdel.php">
                        <p style="font-size: 30px;font-weight: 700;text-align: center;color: #0F2232;"> Вы действительно хотите удалить новость?</p>
                        <p style="padding-left: 15%; display: none;">id
                            <input id="idnumberd" name="idnameddel" type="text" style="width: 50%; height: 70%;margin-right:30px;float: right;">
                        </p>
                        <div style=" width: 500px;" class="button_some">
                            <button name="deletet" type="submit" onclick="ModalAddendum(3)">Да</button>
                            <button type="reset" onclick="ModalAddendum(3)">Нет</button>
                        </div>
                    </form>
                </div>
            </div>
                </div>
                <script>
                function ModalAddendum(n) {
                    let modal1 = document.querySelector(".ModalBG1");
                    let modal2 = document.querySelector(".ModalBG2");
                    let modal3 = document.querySelector(".ModalBG3");
                    if (n == 1) {
                        modal1.classList.toggle("hidden");

                    } else if (n == 2) {
                        modal2.classList.toggle("hidden");
                    } else if (n == 3) {
                        modal3.classList.toggle("hidden");
                    }
                }

                function ModalDelete(n, name) {
                    let modal3 = document.querySelector(".ModalBG3");
                    modal3.classList.toggle("hidden");
                    let idqwer = document.querySelector("#idnumberd");
                    idqwer.value = n;
                }


                function ModalEdit(n, name, path, text) {
                    let modal1 = document.querySelector(".ModalBG1");
                    modal1.classList.toggle("hidden");
                    let inputname = document.querySelector("#namenews1");
                    inputname.value = name;
                    let inputpath = document.querySelector("#pathnews1");
                    inputpath.value = path;
                    let inputtext = document.querySelector("#textnews1");
                    inputtext.value = text;
                    let inputid = document.querySelector("#idnumber");
                    inputid.value = n;
                }
            </script>
    </div>


    <div class="container">
<!-- КАТАЛОГ -->

<?php
    $link = new mysqli('localhost', 'root', 'mysql', 'mybd');
    if ($link) {        
            $id =  $_SESSION["id"];
            $result = mysqli_query($link, "
                        SELECT *
                        FROM catalog");
            if (!$result) {
                echo "Не удалось получить данные из таблицы<br>";
            }

        mysqli_close($link);
        }
    ?>
            <div class="quest__list">
                    <div style="height:7%; width:100%; ">
                        <h3 class="stat__title">Каталог</h3>
                        <button style="margin-left: 0px" onclick="ModalAddendum1(2)">
                            Добавить
                        </button>
                    </div>

                    <?php
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                        <div class="question_update">
                            <p style="width: 50%;display: flex;align-items: center;" id="<?php echo $row["id"]; ?>">
                                <?php echo $row["title"]; ?>
                    </p>
                            <div class="d" ><button style="margin-top: 10px;margin-bottom: 10px;" onclick='ModalEdit1( <?php echo $row["id"];
                                                                        echo ", `{$row["title"]}`";
                                                                        echo ", `{$row["image"]}`";
                                                                        echo ", `{$row["price"]}`" ?> )'>
                                    Редактировать
                                </button>
                                <button style="margin-top: 10px;margin-bottom: 10px;" onclick='ModalDelete1( <?php echo $row["id"];
                                                                echo ", `{$row["title"]}`" ?> )'>
                                    Удалить
                                </button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="ModalBG ModalBG1c hidden">
                    <div class="ModalAddendum2">
                        <form method="post" action="sqlcatalogup.php">
                            <p style="font-size: 30px;font-weight: 700;text-align: center;color: #0F2232;">Редактирование каталога</p>
                            <p style="color: #0F2232;padding-left: 10%">Название
                                <input id="namecatalog1" name="namecatalog" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                            </p>
                            <p style="color: #0F2232;padding-left: 10%">Путь до изображения
                                <input id="pathcatalog1" name="pathcatalog" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                            </p>
                            <p style="color: #0F2232;padding-left: 10%">Цена
                                <input id="pricecatalog1" name="pricecatalog" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                            </p>
                            <p style="color: #0F2232;padding-left: 10%;display: none">id
                                <input id="idnumberc" name="idname" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                            </p>
                            <div style=" width: 700px;" class="button_some">
                                <button name="savet" type="submit" onclick="ModalAddendum1(1)">Сохранить</button>
                                <button type="reset" onclick="ModalAddendum1(1)">Отмена</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="ModalBG ModalBG2c hidden">
                <div class="ModalAddendum3">
                    <form method="post" action="sqlcataloged.php">
                        <p style="font-size: 30px;font-weight: 700;text-align: center;color: #0F2232;">Добавление в каталог</p>
                        <p style="color: #0F2232;padding-left: 10%">Название
                            <input id="namecatalogp" name="namecatalogp" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                        </p>

                        <p style="color: #0F2232;padding-left: 10%">Путь до изображения
                            <input id="pathcatalogp" name="pathcatalogp" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                        </p>
                        <p style="color: #0F2232;padding-left: 10%">Цена
                            <input id="pricecatalogp" name="pricecatalogp" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                        </p>
                        <p style="color: #0F2232;padding-left: 10%;display: none">id
                            <input id="idnumberpc" name="idnamep" type="text" style="width: 50%; height: 20px;margin-right:70px;float: right;">
                        </p>
                        <div style=" width: 700px;" class="button_some">
                            <button name="insertt" type="submit" onclick="ModalAddendum1(2)">Добавить</button>
                            <button type="reset" onclick="ModalAddendum1(2)">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ModalBG ModalBG3c hidden">
                <div class="modalAuth">
                    <form method="post" action="sqlcatalogdel.php">
                        <p style="font-size: 30px;font-weight: 700;text-align: center;color: #0F2232;"> Вы действительно хотите удалить объект из каталога?</p>
                        <p style="padding-left: 15%; display: none;">id
                            <input id="idnumberdc" name="idnameddel" type="text" style="width: 50%; height: 70%;margin-right:30px;float: right;">
                        </p>
                        <div style=" width: 500px;" class="button_some">
                            <button name="deletet" type="submit" onclick="ModalAddendum1(3)">Да</button>
                            <button type="reset" onclick="ModalAddendum1(3)">Нет</button>
                        </div>
                    </form>
                </div>
            </div>
                </div>
                <script>
                function ModalAddendum1(n) {
                    let modal1c = document.querySelector(".ModalBG1c");
                    let modal2c = document.querySelector(".ModalBG2c");
                    let modal3c = document.querySelector(".ModalBG3c");
                    if (n == 1) {
                        modal1c.classList.toggle("hidden");

                    } else if (n == 2) {
                        modal2c.classList.toggle("hidden");
                    } else if (n == 3) {
                        modal3c.classList.toggle("hidden");
                    }
                }

                function ModalDelete1(n, name) {
                    let modal3c = document.querySelector(".ModalBG3c");
                    modal3c.classList.toggle("hidden");
                    let idqwerc = document.querySelector("#idnumberdc");
                    idqwerc.value = n;
                }


                function ModalEdit1(n, name, path, price) {
                    let modal1c = document.querySelector(".ModalBG1c");
                    modal1c.classList.toggle("hidden");
                    let inputnamec = document.querySelector("#namecatalog1");
                    inputnamec.value = name;
                    let inputpathc = document.querySelector("#pathcatalog1");
                    inputpathc.value = path;
                    let inputprice = document.querySelector("#pricecatalog1");
                    inputprice.value = price;
                    let inputidc = document.querySelector("#idnumberc");
                    inputidc.value = n;
                }
            </script>
</div>

        <!-- ВЫХОД -->
        <div style="display: flex; margin: 50px 50px 50px 50px">
            <form action="exit.php" method="POST">
                <button>Выход</button>
            </form>
        </div>
</body>
</html>
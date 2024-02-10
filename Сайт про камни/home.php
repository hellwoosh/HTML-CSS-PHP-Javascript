<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock</title>
</head>
<body>

    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">Rock</div>

                <input id="menu-toggle" type="checkbox" />
                <label class='menu-button-container' for="menu-toggle">
                <div class='menu-button'></div>
                </label>

                <nav class="nav" id="myTopnav">
                    <a class="nav__link" href="#about">About</a>
                    <a class="nav__link" href="#news">News</a>
                    <a class="nav__link" href="#catalog">Catalog</a>
                    <a class="nav__link" href="#contact">Contact</a>
                </nav>

            </div>
        </div>
    </header>

    <div class="intro">
        <div class="container">
            <div class="intro__inner">
                <h1 class="intro__suptitle">Dreams come true</h1>
                <h2 class="intro__title">Welcome to Rock</h2>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container">

            <div id="about"  class="section__header">
                <h3 class="section__suptitle">What we do</h3>
                <h4 class="section__title">Story about us</h4>
                <div class="section__text">
                    <p>Мы начали свой путь, как все. Жили и ходили по земле, 
                    не осознавая, что под нашими ногами лежит настоящее сокровище. 
                    Но в один прекрасный момент мы прозрели и познали истинную красоту камней.</p>
                </div>
            </div>

            <div class="about">
                <div class="about__item">
                    <div class="about__img">
                        <img src="assets/images/about/1.jpg" alt="">
                    </div>
                    <div class="about__text">они</div>
                </div>
                <div class="about__item">
                    <div class="about__img">
                        <img src="assets/images/about/2.jpg" alt="">
                    </div>
                    <div class="about__text">просто</div>
                </div>
                <div class="about__item">
                    <div class="about__img">
                        <img src="assets/images/about/3.jpg" alt="">
                    </div>
                    <div class="about__text">невероятны</div>
                </div>
            </div>

        </div>
    </section>

    <div class="time">
        <div class="container">
            <script src="assets/javascript/time.js"></script>
            <div class="t">
                <div id="Year" class="t__item"></div>
                <div id="Month" class="t__item"></div>
                <div id="Day" class="t__item"></div>
                <div id="Hour" class="t__item"></div>
                <div id="Minute" class="t__item"></div>
                <div id="Second" class="t__item"></div>
            </div>

        </div>
    </div>

    <section class="section">
        <div class="container">

            <div id="news" class="section__header">
                <h5 class="section__suptitle">What's happening</h5>
                <h6 class="section__title">Our News</h6>
                <div class="section__text">
                    <p>В этом разделе вы узнаете последние новости из мира камней.</p>
                </div>
            </div>

            <div class="news">
                <?php 
                $link = new mysqli('localhost', 'root', 'mysql', 'mybd');
                $result = mysqli_query($link, "SELECT * FROM `news`");
                
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
                { ?>
                <div class="news__item">
                    <h7 class="news__title"><?php echo $row["title"] ?></h7>
                    <div class="news__img">
                        <img src="<?php echo $row["image"] ?>" alt="">
                    </div>
                    <div class="news__text">
                    <?php echo $row["text"] ?></div>
                </div>
                        
                    <?php

                }
                mysqli_close($link);
                ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">

            <div id="catalog" class="section__header">
                <h9 class="section__title">Catalog</h9>
                <div class="section__text">
                    <p>В этом разделе вы можете приобрести самые необычные камни.</p>
                </div>
            </div>

            <div class="catalog">

                <?php 
                $link = new mysqli('localhost', 'root', 'mysql', 'mybd');
                $result = mysqli_query($link, "SELECT * FROM `catalog`");
                
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
                { ?>
                        <div class="catalog__item">
                        <h10 class="catalog__title"><?php echo $row["title"] ?></h10>
                        <div class="catalog__img">
                            <img src= "<?php echo $row["image"] ?>" alt="">
                        </div>
                        <div class="catalog__text">
                        <?php echo $row["price"] ?>$
                        </div>
                    </div>
                    <?php
                }
                mysqli_close($link);
                ?>

            </div>

        </div>
    </section>

    <section class="section">
        <div class="container">

            <div id="contact" class="section__header">
                <h14 class="section__title">Contact</h14>
                <div class="section__text">
                    <p>В этом разделе вы увидите легенд этой планеты.</p>
                </div>
            </div>

            <div id="contact" class="contact">
                <table>
                    <tr>
                       <th>Должность</th>
                       <th>Имя</th>
                       <th>Номер телефона</th>  
                       <th>Ссылка на телеграм</th>         
                    </tr>
                    <tr>
                        <td>Правитель Камнеландии</td>
                        <td>Ваня</td>
                        <td>89998887766</td>  
                        <td>@PochonokBiva</td>         
                    </tr>
                    <tr>
                        <td>Штурмовик Камневойн</td>
                        <td>Гриша</td>
                        <td>89526789075</td>  
                        <td>@IloveRock</td>         
                    </tr>
                    <tr>
                        <td>Голос Камня</td>
                        <td>Понтелей</td>
                        <td>Секретно</td>  
                        <td>Секретно</td>      
                    </tr>
                </table>
            </div>
        
        </div>
    </section>

</body>
</html>
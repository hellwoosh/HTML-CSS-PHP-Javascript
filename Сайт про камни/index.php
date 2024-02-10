<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="">
     
        <!-- Форма авторизации -->
        <div class="container">
            <form class="auth" action="auth.php" method="POST">
                <h1>Авторизация</h1>
                <div class="auth__item">
                    <label>Логин</label>
                    <input name="login" type="text">
                </div>
                <div class="auth__item">
                    <label>Пароль</label>
                    <input name="pass" type="password"> 
                </div>
                <button type="submit">Войти</button>
            </form>
        </div>

    </div>

</body>
</html>
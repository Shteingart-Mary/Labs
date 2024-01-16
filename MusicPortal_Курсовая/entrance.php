<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Sweet-Note</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
         <form action="SQL_connection/login.php" class="flex" method="POST">
            <fieldset>
                <div class="center">
                    <div>
                        <h1 class="word">♪ Вход ♪</h1>
                    </div>
                    <div class="center margin">
                        <img src="forest.jpg" alt="picture" style="width: 70%; border-radius: 15%;">
                    </div>
                    <div class="margin">
                        <input type="text" placeholder="Логин" name="login" required>
                    </div>
                    <div class="margin">
                        <input type="password" placeholder="Пароль" name="password" minlength="8" required>
                    </div>
                    <div class="margin">
                        <button type="submit">Войти</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
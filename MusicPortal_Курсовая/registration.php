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
        <form action="SQL_connection/SQLRepos.php" method="POST" class="flex" enctype="multipart/form-data">
          <fieldset>
               <div class="center">
                   <div>
                        <h1 class="word">♪ Регистрация ♪</h1>
                   </div>
                   <div class="margin">
                         <label class="photo">
                               <input name="file" type="file" accept="image/*" required>     
                               <span>Выберите фото</span>
                         </label>
                    </div>
                    <div class="margin">
                        <input type="text" placeholder="Фамилия" name="surname" required>
                   </div>
                   <div class="margin">
                        <input type="text" placeholder="Имя" name="name" required>
                   </div>
                   <div class="margin">
                         <input type="text" placeholder="Отчество" name="secondname">
                    </div>
                    <div class="margin">
                         <input type="date" name="date" placeholder="Дата рождения" required>
                    </div>
                    <div class="margin">
                         <input type="text" placeholder="Логин" maxlength="20" name="login" required>
                    </div>
                   
                   <div class="margin">
                        <input type="password" minlength="8" maxlength="25" placeholder="Пароль" name="password" required>
                   </div>
                   <div class="margin">
                        <button type="submit">Зарегистрироваться</button>
                   </div>
               </div>
          </fieldset>
       </form>
   </div>
   
   <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
   <script src="photo.js"></script>
</body>
</html>
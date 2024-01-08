<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $secondname = $_POST["secondname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $birthdate = $_POST["birthdate"];
}
echo "Фамилия: $surname";
echo '<br>';
echo "Имя: $name";
echo '<br>';
echo "Отчество: $secondname";  
echo '<br>';
echo "Дата рождения: $birthdate"; 
?>
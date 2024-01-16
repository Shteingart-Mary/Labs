<?php 
include "connection.php"; 
if(isset($_POST["login"]))
{
    $login = $_POST["login"];
    $password = $_POST["password"];

    $query = $conn->query("select * from users where Login = '$login' and Password = '$password';");

    if ($query->rowCount() == 1) {
        $_SESSION["login"] = $login;
        $_SESSION["password"] = $password;
        $row = $query->fetch();
        $_SESSION["photo"] = $row["Link"];
        $new_url = "http://localhost/musicportal/profil.php";
        header("Location: " . $new_url);
    }
}
?>
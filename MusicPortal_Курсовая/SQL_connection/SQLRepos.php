<?php 
    include "connection.php";

    if(isset($_POST["login"]))
    {
        $link;
        if ($_FILES and $_FILES["file"]["error"] == UPLOAD_ERR_OK){
            $file_name = "user_photos/" . $_FILES["file"]["name"];
            move_uploaded_file($_FILES["file"]["tmp_name"], $file_name);
            $link = $file_name;
        }


        $surname = $_POST["surname"];
        $name = $_POST["name"];
        $secondname = $_POST["secondname"];
        $date = $_POST["date"];
        $login = $_POST["login"];
        $password = $_POST["password"];

        $conn->exec("insert into Users (Surname, Name, Secondname, Date, Login, Password, Link) 
        values ('$surname', '$name', '$secondname', '$date', '$login', '$password', '$link');");

        $_SESSION["login"]=$login;
        $_SESSION["password"]=$password;
        $_SESSION["photo"] = $link;

        $new_url = "http://localhost/musicportal/profil.php";
        header("Location: " . $new_url);
    }
?>



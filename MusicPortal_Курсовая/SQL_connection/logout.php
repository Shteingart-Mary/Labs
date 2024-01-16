<?php 
session_destroy();
$new_url = "http://localhost/musicportal/sweet-note.php";
header("Location: " . $new_url);
?>

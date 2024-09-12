<?php
session_start();
require './config/config.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5(string: $_POST['password']);  

    $query = $pdo->prepare("SELECT * FROM teachers WHERE username = ? AND password = ?");
    $query->execute([$username, $password]);

    if ($query->rowCount() > 0) {
        $_SESSION['username'] = $username;
        header('Location: ./home.php');
    } else {
        $_SESSION['error'] = "Invalid username or password";
        header('Location: ./');
    }
}
?>

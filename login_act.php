<?php 
session_start();
include 'functions.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if (empty($email) || empty($password)){
        $_SESSION['msg_login'] = '<div class="alert alert-danger">Please enter the requierd fields</div>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    if (!isUserExists($email)){
        $_SESSION['msg_login'] = '<div class="alert alert-danger">Wrong username or password</div>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $sql = mysqli_query($conn, "SELECT * FROM `user_table` WHERE `email` = '$email' AND `password` = '$password'") or die(mysqli_error($conn));
   

    if ($sql){
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['USERAUTH'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['level'] = $row['level'];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

?>
<?php 
include 'functions.php';
session_start();

if (isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    if (empty($name) || empty($email) || empty($password) || empty($level)) {
        $_SESSION['msg_register'] = '<div class="alert alert-danger">Please enter the requierd fields</div>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
   
    if (isUserExists($email)){
        $_SESSION['msg_register'] = '<div class="alert alert-warning">User already exists</div>';
        header('Location: ' .$_SERVER['HTTP_REFERER']);
        exit;
    }

    $sql = mysqli_query($conn, "INSERT INTO `user_table`
                                (`email`, `name`, `password`, `level`) 
                                VALUES ('$email','$name','$password','$level')
                                ") or die(mysqli_error($conn));


    if ($sql) {
        $_SESSION['msg_register'] = '<div class="alert alert-success">User registered</div>';
        header('Location: ' .$_SERVER['HTTP_REFERER']);
        exit;
    }

}

?>
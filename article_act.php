<?php
session_start();
include 'database.php';
include 'functions.php';

if (isset($_POST['submit'])){
    $title = $_POST['title'];
    $article = $_POST['article'];
    $user_id = $_SESSION['id'];

    if (empty($title)){
        $_SESSION['msg_title'] = '<div class="alert alert-danger">Please enter a title</div>';
        header('Location: ' .$_SERVER['HTTP_REFERER']);
        exit;
    }

    if (empty($article)) {
        $_SESSION['msg_article'] = '<div class="alert alert-danger">Please enter an article</div>';
        header('Location: ' .$_SERVER['HTTP_REFERER']);
        exit;
    }

    $sql = mysqli_query($conn, "INSERT INTO `articles`(`user_id`, `title`, `text`, `created_at`) VALUES ('$user_id', '$title', '$article',  current_timestamp())") or die(mysqli_error($conn));

    if ($sql){
        $_SESSION['msg_article_created'] = '<div class="alert alert-success">Successfully submited</div>';
        header('Location: index.php');
        exit;
    }

}

if ($_POST['edit']) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $article = $_POST['article'];

    if (empty($title)) {
        $_SESSION['msg_title'] = '<div class="alert alert-danger">Please enter a title</div>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    if (empty($article)) {
        $_SESSION['msg_article'] = '<div class="alert alert-danger">Please enter an article</div>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $sql = mysqli_query($conn, "UPDATE `articles` SET `title` = '$title', `text` = '$article', `created_at` = current_timestamp() WHERE `id` = '$id'") or die(mysqli_error($conn));

    if ($sql) {
        $_SESSION['msg_article_edited'] = '<div class="alert alert-success">Article updated</div>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

if ($_GET['action'] = 'delete') {
    $id = $_GET['id'];
    $sql = mysqli_query($conn, "DELETE FROM `articles` WHERE `id` = '$id' AND `user_id` = '".$_SESSION['id']."'") or die(mysqli_error($conn));

    if ($sql) {
    $_SESSION['msg_article'] = '<div class="alert alert-danger">Article deleted</div>';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
    }

}




?>
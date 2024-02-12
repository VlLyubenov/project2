<?php 

include 'functions.php';
session_start();


if (isset($_POST['submit_comment'])) {
    $article_id = $_GET['article_id'];
    $user_id = $_GET['user_id'];
    $comment = $_POST['comment'];


    if (empty($comment)){
        $_SESSION['msg_comment'] = '<div class="alert alert-danger">Please enter a comment</div>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $sql = mysqli_query($conn,"INSERT INTO `comments`(`article_id`, `user_id`, `comment`, `created_at`) VALUES ('$article_id','$user_id','$comment', current_timestamp())")
    or die(mysqli_error($conn));

    if ($sql) {
        $_SESSION['msg_comment'] = '<div class="alert alert-success">You have entered a comment</div>';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }


}


?>
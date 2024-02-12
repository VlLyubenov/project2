<?php 

include 'database.php';

function isUserExists($email) {
    global $conn;
    $sql = mysqli_query($conn, "SELECT * FROM `user_table` WHERE `email` = '$email'") or die(mysqli_error($conn));
    $num = mysqli_num_rows($sql);
    if ($num > 0) {
        return true;
    }else{
        return false;
    }
}

function getUserInfo($id) {
    global $conn;
    $sql = mysqli_query($conn, "SELECT * FROM `user_table` WHERE `id` = '$id'") or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($sql);
    return $row;
}

function getArticles() {
    global $conn;
    $sql = mysqli_query($conn, "SELECT 
                                `articles`.`id`, 
                                `articles`.`user_id`, 
                                `articles`.`title`, 
                                `articles`.`text`, 
                                `articles`.`created_at`, 
                                `user_table`.`name` 
                                FROM `articles` 
                                LEFT JOIN `user_table` 
                                ON `articles`.`user_id`=`user_table`.`id`; ") or die(mysqli_error($conn));
    return $sql;
}

function getArticleInfo ($id) {
    global $conn;
    $sql = mysqli_query($conn, "SELECT * FROM `articles` WHERE `id`='$id'") or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($sql);
    return $row;
}

function getComments ($article_id) {
    global $conn;
    $sql = mysqli_query($conn, "SELECT 	`comments`.`id`,
                                        `comments`.`article_id`,
                                        `comments`.`user_id`,
                                        `comments`.`comment`,
                                        `comments`.`created_at`,
                                        `user_table`.`name`
                                        FROM `comments`
                                        LEFT JOIN `user_table`
                                        ON `comments`.`user_id`=`user_table`.`id`
                                        WHERE `article_id` = '$article_id'
                                        ") or die(mysqli_error($conn));
    return $sql;
}

?>
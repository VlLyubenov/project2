<?php session_start();
error_reporting(E_ERROR | E_PARSE);
include 'functions.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <title>articles</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h5>Welcome <?php echo getUserInfo($_SESSION['id'])['name']; ?>!</h5>

        <form action="article_act.php?id=<?php echo $_GET['id'];?>&action=edit" method="post">
            <?php echo $_SESSION['msg_article_edited'];
            unset($_SESSION['msg_article_edited']); ?>
            <?php $article_data = getArticleInfo($_GET['id']); ?>
            <div class="form-group">
                <label for="title">Title</label>
                <input id="title" class="form-control" type="text" name="title" value="<?php echo $article_data['title']; ?>">
            </div>
            <div class="form-group">
                <label for="article">Your article</label>
                <textarea name="article" id="article" cols="30" rows="10" class="form-control"><?php echo $article_data['text']; ?></textarea>
            </div>
            <button class="btn btn-warning btn-md my-3" name="edit" type="submit" value="1">Edit</button>
        </form>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
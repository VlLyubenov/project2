<?php session_start();
error_reporting(E_ERROR | E_PARSE);
include 'functions.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <title>Article detail</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php $article_data = getArticleInfo($_GET['id']);
    $user_data = getUserInfo($article_data['user_id']);
    $comments = getComments($article_data['id']);
    ?>

    <div class="container">
        <h5>Welcome <?php echo getUserInfo($_SESSION['id'])['name']; ?>!</h5>

        <?php echo $_SESSION['msg_comment'];
        unset($_SESSION['msg_comment']); ?>

       
            <?php if ($article_data['user_id'] != $_SESSION['id']): ?>
                <h5><?php echo $user_data['name']; ?>'s article</h5>
            <?php else: ?>
                <h5>Your article</h5>
            <?php endif; ?>
                
                <h6><?php echo $article_data['title']; ?></h6>
                <p><?php echo $article_data['text']; ?></p>

       
            <?php foreach ($comments as $comment) : ?>
                <div class="card">
                    <h6><i>Comment from<?php echo $comment['name']; ?></i></h6>
                    <p><i><?php echo $comment['comment']; ?></i></p>
                </div>
            <?php endforeach; ?>
        


        
            <form action="comment_act.php?article_id=<?php echo $article_data['id']; ?>&user_id=<?php echo $article_data['user_id']; ?>" class="stripped" method="post">
                <div class="form-group">
                    <label for="comment">Enter your comment</label>
                    <textarea name="comment" id="comment" cols="5" rows="2" class="form-control"></textarea>
                </div>
                <button class="btn btn-primary" typle="submit" name="submit_comment" value="1">Comment</button>
            </form>
       


    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
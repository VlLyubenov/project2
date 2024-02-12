
    <form action="article_act.php" class="stripped" method="post">
      <?php echo $_SESSION['msg_title'];
      unset($_SESSION['msg_title']); ?>
      <?php echo $_SESSION['msg_article'];
      unset($_SESSION['msg_article']); ?>
      
      <div class="form-group">
        <label for="title">Title</label>
        <input id="title" class="form-control" type="text" name="title" >
      </div>
      <div class="form-group">
        <label for="article">Your article</label>
        <textarea name="article" id="article" cols="30" rows="10" class="form-control"></textarea>
      </div>
      <button class="btn btn-primary btn-md my-3" name="submit" type="submit" value="1">Submit</button>
    </form>


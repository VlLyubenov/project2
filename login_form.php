<div class="col-md-6">
    <h1>Login</h1>
    <?php echo $_SESSION['msg_login'];
    unset($_SESSION['msg_login']); ?>
    <form action="login_act.php" class="stripped" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="text" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" class="form-control" type="password" name="password">
        </div>
        <button class="btn btn-success my-3 btn-md" type="submit" name="login" value="1">Login</button>
    </form>
</div>
<div class="col-md-6">
    <h1>Register</h1>
    <?php echo $_SESSION['msg_register'];
    unset($_SESSION['msg_register']); ?>
    <form action="register_act.php" class="stripped" method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" class="form-control" type="text" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="text" name="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="email" class="form-control" type="password" name="password">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <select name="level" id="level" class="form-control">
                <option value="">- Select -</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
            <button class="btn btn-primary my-3" type="submit" name="register" value="1">Register</button>
        </div>
    </form>
</div>
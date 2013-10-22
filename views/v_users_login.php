<div class="col-md-6 col-md-offset-3">
    <h2 class="page-header">Hi there, fellow Blabbr. Log on in.</h2>
    <form role="form" method="POST" action="/users/login">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" <?php if(isset($_POST['email'])) echo "value = '". $_POST['email'] ."'"?>>
        </div>
        <div class="form-group">
            <label for="first_name">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div> 
        <!-- warn on login errors -->
        <?php if(isset($error)): ?>
            <div class="callout-error">
                <h4>Login failed.</h4> 
                <?php echo $error; ?>
            </div>
        <?php endif; ?> 
        <button type="submit" class="btn btn-custom">Login</button>   
    </form>
</div>
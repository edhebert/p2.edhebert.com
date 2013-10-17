<div class="col-md-6 col-md-offset-3">
    <h2 class="page-header">Start Blabbing.<br>Create a Blabbr account.</h2>
    <form role="form" method="POST" action="/users/signup">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" <?php if(isset($_POST['first_name'])) echo "value = '". $_POST['first_name'] ."'"?>>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" <?php if(isset($_POST['last_name'])) echo "value = '". $_POST['last_name'] ."'"?>>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" <?php if(isset($_POST['email'])) echo "value = '". $_POST['email'] ."'"?>>
        </div>
        <div class="form-group">
            <label for="first_name">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>  
        <!-- warn on signup errors -->
        <?php if(isset($error)): ?>
            <div class="callout-error">
                <h4>Signup failed.</h4> 
                <?php echo $error; ?>
            </div>
        <?php endif; ?> 
        <button type="submit" class="btn btn-custom">Create an Account</button>   
    </form>
</div>

<div class="col-md-6 col-md-offset-3">
    <h2 class="page-header">Hi there, fellow Blabbr. Log on in.</h2>
    <form role="form" method="POST" action="/users/p_login">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="first_name">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div> 
        <!-- warn on login errors -->
        <?php if(isset($error)): ?>
            <div class="callout-error">
                <h4>Login failed.</h4> 
                <p>Please double check your email and password.</p>
            </div>
        <?php endif; ?> 
        <button type="submit" class="btn btn-custom">Login</button>   
    </form>
</div>
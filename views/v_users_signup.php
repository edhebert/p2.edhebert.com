<div class="col-md-6 col-md-offset-3">
    <h2 class="page-header">Create your very own Blabbr account.</h2>
    <form role="form" method="POST" action="/users/p_signup">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="first_name">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>  
        <button type="submit" class="btn btn-default">Create an Account</button>   
    </form>
</div>

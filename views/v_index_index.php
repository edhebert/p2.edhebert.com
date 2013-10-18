<?php if($user) router::redirect('users/profile');;?>
<h1>Welcome to <?=APP_NAME?></h1>
<div class="row">
    <div class="col-md-4 col-md-offset-1 centered">
        <h2 class="centered">Sign Up</h2>
        <p>Join the newest revolution in social media. It's way cooler than Twitter. You'll see.</p>
        <a href="/users/signup" class="btn btn-custom">Create an Account</a>
    </div>
    <div class="col-md-4 col-md-offset-2 centered">
        <h2>Log In</h2>
        <p>Well, look what the cat dragged in? Where have you been? We were worried. Let's go.</p>
        <a href="/users/login" class="btn btn-custom">Log In</a>
    </div>
</div>
<p>Note: My &apos;+1&apos; features are
    <ul>
        <li>Emailing a signup confirmation to a new user.</li>
        <li></li>
    </ul>
</p>
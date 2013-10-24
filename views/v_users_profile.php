<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="page-header">Hiya, <?=$user->first_name?>!</h1>
        <p>You've been a proud Blabbr since <?= date('F j, Y', $user->created) ?>.</p>
        <h4>How the world sees you</h4>
        <?php if ($user->image  == 'placeholder.jpg'): ?>
            <p>Why not keep your profile looking snazzy with a nice picture of your fine self?</p>
        <?php endif; ?>
        <form role="form" method='POST' enctype="multipart/form-data" action='/users/profile_update/'>
        	<img src="/uploads/avatars/<?= $user->image ?>" alt="<?=$user->first_name . ' ' . $user->last_name ?>">    		
    		<div class="form-group">
    			<label for="exampleInputFile">Your Profile Image</label>
    			<input type="file" id="avatar" name="avatar">
    		</div>
    		<button type="submit" class="btn btn-custom">Update Your Profile Image</button>
        </form>       
    </div>
</div>
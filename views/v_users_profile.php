<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h1 class="page-header">Hiya, <?=$user->first_name?>!</h1>
        <p>There's a whole bunch of stuff you'll be able to do from this profile page, like edit your info and stuff, see who's following you, see who you're following, etc. But I have to build that first.</p>
        <form role="form" method='POST' enctype="multipart/form-data" action='/users/profile_update/'>
        
        <?php if ($user->image): ?>
        	<img src="/uploads/avatars/<?= $user->image ?>" alt="<?=$user->first_name?>">
    	<?php else: ?>
    		<img src="/uploads/avatars/placeholder-person.jpg" alt="No image uploaded">
		<?php endif ?>
		
		<div class="form-group">
			<label for="exampleInputFile">Profile Image</label>
			<input type="file" id="avatar" name="avatar">
		</div>
		<button type="submit" class="btn btn-custom">Update Your Profile</button>
    </div>
</div>
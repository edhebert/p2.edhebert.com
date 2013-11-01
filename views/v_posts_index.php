<article>
	<div class="row">
		<div class="col-sm-1">
			<img class="img-circle avatar" src="/uploads/avatars/<?= $user->image ?>">
		</div>
		<div class="col-sm-11">
			<form method='POST' action='/posts/p_add' class='postform'>
			    <div class="form-group">
			        <label for='content'>Add your own Blabb!</label>
			        <textarea class="form-control" rows="3" name='content' id='content'></textarea>
			    </div>
			    <button type='submit' class="btn btn-custom">New Post</button>
			</form> 
	        <?php if(isset($error)): ?>
	            <div class="callout-error">
	                <h4>Post failed.</h4> 
	                <p>Say somethin' besides nuthin!</p>
	            </div>
	        <?php endif; ?>
	    </div>
    </div>
</article>
<h4 class="page-header">Blabbrs you're following</h4>
<?php if (count($posts) == 0) :?>
	<p>Hey, you haven't followed anyone yet!<br>Why not <a href="/posts/users">follow some Blabbrs</a> now?</p>
<?php endif; ?>
	
<?php foreach($posts as $post): ?>
<article>
	<div class="row">
		<div class="col-xs-2 col-lg-1">
			<img class="img-circle avatar" src="/uploads/avatars/<?=$post['image']?>">
		</div>
	    <div class="col-xs-10 col-lg-11">
	    	<div class="well post">
	    		<h4><?=$post['first_name']?> <?=$post['last_name']?></h4>
	    		<p><?= stripslashes($post['content'])?></p>
	    		<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
			        <small><em><?=Time::display($post['created'])?></em></small>
			    </time>
	    	</div>
	    </div>
    </div>
</article>

<?php endforeach; ?>
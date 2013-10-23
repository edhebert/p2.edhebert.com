<?php foreach($posts as $post): ?>
<?php         
	// send a picture to the view
    if($post['image'] == '0')
        $post['image'] = "placeholder-person.jpg";
?>
<article>
	<div class="row">
		<div class="col-sm-1">
			<img class="img-circle avatar" src="/uploads/avatars/<?=$post['image']?>">
		</div>
	    <div class="col-sm-11">
	    	<div class="well post">
	    		<h4><?=$post['first_name']?> <?=$post['last_name']?></h4>
	    		<p><?=$post['content']?></p>
	    		<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
			        <small><em><?=Time::display($post['created'])?></em></small>
			    </time>
	    	</div>
	    </div>
    </div>
</article>

<?php endforeach; ?>
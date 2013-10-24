<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Follow some Blabbrs!</h2>
    </div>
    <?php foreach($users as $blabbr): ?>
        <!-- you can't unfollow yourself so your button isn't shown -->
        <?php if ($user->user_id != $blabbr['user_id']) : ?>
        <div class="col-sm-4 col-md-2">
            <div class="thumbnail">
                <!-- User info -->
                <img class="img-circle avatar" src="/uploads/avatars/<?=$blabbr['image']?>" alt="<?=$blabbr['first_name']?> <?=$blabbr['last_name']?>">
                <div class="caption">
                    <h5><?=$blabbr['first_name']?> <?=$blabbr['last_name']?></h5>
                    <!-- If there exists a connection with this user, show an unfollow link -->
                    <?php if(isset($connections[$blabbr['user_id']])): ?>
                        <p><a href="/posts/unfollow/<?=$blabbr['user_id']?>" class="btn btn-custom">Unfollow</a></p>
                    <!-- Otherwise, show the follow link -->
                    <?php else: ?>
                        <p><a href="/posts/follow/<?=$blabbr['user_id']?>" class="btn btn-custom">Follow</a></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
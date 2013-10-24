<div class="row">
    <div class="col-md-12">
        <h2 class="page-header">Follow some Blabbrs!</h2>
    </div>
    <?php foreach($users as $user): ?>
        <div class="col-sm-4 col-md-2">
            <div class="thumbnail">
                <!-- User info -->
                <img class="img-circle avatar" src="/uploads/avatars/<?=$user['image']?>" alt="<?=$user['first_name']?> <?=$user['last_name']?>">
                <div class="caption">
                    <h5><?=$user['first_name']?> <?=$user['last_name']?></h5>
                    <!-- If there exists a connection with this user, show an unfollow link -->
                    <?php if(isset($connections[$user['user_id']])): ?>
                        <p><a href="/posts/unfollow/<?=$user['user_id']?>" class="btn btn-custom">Unfollow</a></p>
                    <!-- Otherwise, show the follow link -->
                    <?php else: ?>
                        <p><a href="/posts/follow/<?=$user['user_id']?>" class="btn btn-custom">Follow</a></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
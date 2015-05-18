<hr>

<h2>Comments</h2>

<?php if(!empty($message)): ?>
    <p class="validation-message" style="color:red;"><?= $message ?></p>
<?php endif ?>

<?php if (is_array($comments)) : ?>
<div class='comments'>
<?php foreach ($comments as $id => $comment) : ?>
<div class="comment">
<h4>Comment #<?=$id?></h4>
<h5>Name: <?= $comment["name"]  ?></h5>
<p>mail: <?= $comment["mail"] ?></p>
<p>comment: <?= $comment["content"] ?></p>
<p>ip: <?= $comment["ip"] ?></p>
<p>timestamp: <?= $comment["timestamp"] ?></p>
</div>
<?php endforeach; ?>
</div>
<?php endif; ?>
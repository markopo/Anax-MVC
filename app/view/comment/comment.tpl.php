
<h2>Comment</h2>

<div class="comment">
    <h4>Comment #<?=$id?></h4>
    <h5>Name: <?= $name  ?></h5>
    <p>mail: <?= $mail ?></p>
    <p>comment: <?= $content ?></p>
    <p>ip: <?= $ip ?></p>
    <p>timestamp: <?= $timestamp ?></p>
    <p><a href="?id=<?= $id ?>&action=edit">edit</a> | <a href="?id=<?= $id ?>&action=delete">delete</a></p>
</div>
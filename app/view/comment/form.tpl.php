


<div class='comment-form'>

    <?php if(!empty($message)): ?>
        <p class="validation-message" style="color:red;"><?= $message ?></p>
    <?php endif ?>
    <h3>Action: <?= $action ?></h3>
    <form method="post" id="comment-form" >
        <input type="hidden" id="id" name="id" value="<?= $id ?>" >
        <input type="hidden" id="action" name="action" value="<?= $action ?>" >

        <input type=hidden name="redirect" value="<?=$this->url->create('comments')?>">
        <fieldset>
        <legend>Leave a comment</legend>
        <p><label>Comment:<br/><textarea name='content'><?=$content?></textarea></label></p>
        <p><label>Name:<br/><input type='text' name='name' value='<?=$name?>'/></label></p>
        <p><label>Homepage:<br/><input type='text' name='web' value='<?=$web?>'/></label></p>
        <p><label>Email:<br/><input type='text' name='mail' value='<?=$mail?>'/></label></p>
        <p class="buttons" >
            <?php if($action === "add" || $action === "edit"): ?>
                <input type='submit' id="doCreate" name='doCreate' value='Comment' />
            <?php endif; ?>
            <?php if($action === "delete"): ?>
                <input type="submit" id="deleteOne" name="deleteOne" value="Delete" >
            <?php endif; ?>
            <input class="reset" type='reset' value='Reset'/>

            <input type='submit' id="doRemoveAll" name='doRemoveAll' value='Remove all' />
        </p>
        </fieldset>
    </form>
</div>

<script>
    $(function() {
        var commentForm = $("#comment-form");
        commentForm.find("input.reset").click(function(e) {
            e.preventDefault();
            commentForm.find("input[type='text']").val("");
            commentForm.find("textarea").html("").focus();
        });


        commentForm.find("#doRemoveAll").click(function() {
           var url = '<?=$this->url->create('comment/remove-all')?>';
           commentForm.attr("action", url);
           commentForm.submit();
        });

        commentForm.find("#doCreate").click(function() {
            var url = '<?=$this->url->create('comment/add')?>';
            commentForm.attr("action", url);
            commentForm.submit();
        });


        commentForm.find("#deleteOne").click(function() {
            var url = '<?= $this->url->create('comment/remove-one')?>?id=<?= $id ?>';
            commentForm.attr("action", url);
            commentForm.submit();
        });


    });
</script>

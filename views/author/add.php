<div class="center">
    <?php if(isset($author) && is_object($author)): ?>
    <h1>Edit Author</h1>
    <?php $url_action = BASE_URL.'author/register&id='.$author->getId(); ?>
    <?php else: ?>
    <h1>New Author</h1>
    <?php $url_action = BASE_URL.'author/register' ?>
    <?php endif; ?>
    <form action="<?=$url_action?>" method="POST">
        <div class="form-group">
            <label for="name">Name<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="name" required="" value="<?=isset($author) && is_object($author) ? $author->getName_author() : ''?>"/>
        </div>
        <div class="form-group">
            <label for="firstSurname">First Surname<span class="text-danger font-weight-bold">*</span></label>
            <input class="form-control" type="text" name="firstSurname" required="" value="<?=isset($author) && is_object($author) ? $author->getFirst_surname() : ''?>"/>
        </div>
        <input class="btn btn-primary mb-2" type="submit" value="Save" name="save" />
    </form>
</div>

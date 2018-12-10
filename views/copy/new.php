
<?php if(isset($copy) && is_object($copy)): ?>
    <h1>Edit Copy</h1>
<?php else: ?>
    <h1>New Book</h1>
<?php endif; ?>
<?php $url_action = BASE_URL.'copy/save&bookId='.$book->getId()?>
<form action="<?=$url_action?>" method="POST">
    <?php if(isset($copy) && is_object($copy)): ?>
    <div class="label-input">
        <label for="id">Id<span class="text-danger font-weight-bold">*</span></label>
        <input type="text" name="id" readonly="" value="<?=$copy->getId()?>" />
    </div>
    <?php endif; ?>
    <div class="label-input">
        <label for="name_book">Book</label>
        <input type="text" name="name_book" readonly="" value="<?=isset($book) && is_object($book) ? $book->getName_book() : ''?>" />
    </div>
    <div class="label-input">
        <label for="status">Status<span class="text-danger font-weight-bold">*</span></label>
        <input type="text" name="status" value="<?=isset($copy) && is_object($copy) ? $copy->getStatus() : ''?>" required=""/>
    </div>
    <input type="submit" value="Save" name="Save" />
</form>



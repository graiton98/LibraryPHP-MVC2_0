<div class="center">
    <h1>Edit Category</h1>
    <form action="<?=BASE_URL?>category/save&id=<?=$category->getId()?>" method="POST">
        <div class="form-group">
            <label class="form-group" for="category">Category Name<span class="text-danger font-weight-bold">*</span></label>
            <?php if(isset($_SESSION['name_category'])): ?>
            <input class="form-control" type="text" name="category" required="" value="<?php echo $_SESSION['name_category']?>" autocomplete="off"/>
                <?php Utils::deleteSession('name_category') ?>
            <?php else: ?>
                <input class="form-control" type="text" name="category" required="" value="<?=$category->getName_category()?>" autocomplete="off"/>
            <?php endif; ?>
        </div>
        <input class="btn btn-primary" type="submit" name="update" value="Update" />
    </form>
</div>

<div class="center">
    <h1>New Category</h1>
    <?php if(isset($_SESSION['category_result'])): ?>
        <p><?php echo $_SESSION['category_result']?></p>
        <?php Utils::deleteSession('category_result') ?>
    <?php endif; ?>
    <form action="<?=BASE_URL?>category/newCategory" method="POST">
        <div class="form-group">
            <label for="category">Category Name<span class="text-danger font-weight-bold">*</span></label>
            <?php if(isset($_SESSION['name_category'])):?>
            <input class="form-control" type="text" name="category" value="<?php echo $_SESSION['name_category']?>" required />
                <?php Utils::deleteSession('name_category')?>
            <?php else: ?>
                <input class="form-control" type="text" name="category" required />
            <?php endif; ?>
        </div>
        <input class="btn btn-primary" type="submit" name="add" value="Add" />
    </form>
</div>


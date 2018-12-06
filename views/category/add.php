<div class="content">
<?php if(isset($_SESSION['category_result'])): ?>
    <p><?php echo $_SESSION['category_result']?></p>
    <?php Utils::deleteSession('category_result') ?>
<?php endif; ?>
<form action="<?=BASE_URL?>category/newCategory" method="POST">
        <div class="label-input">
            <label for="category">Category Name</label>
            <?php if(isset($_SESSION['name_category'])):?>
                <input type="text" name="category" value="<?php echo $_SESSION['name_category']?>" required />
                <?php Utils::deleteSession('name_category')?>
            <?php else: ?>
                <input type="text" name="category" required />
            <?php endif; ?>
        </div>
        <input type="submit" name="add" value="Add" />
    </form>
</div>


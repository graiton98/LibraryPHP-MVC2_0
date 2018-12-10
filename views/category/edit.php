
<?php if(isset($_SESSION['category_result'])): ?>
    <p><?php echo $_SESSION['category_result'] ?></p>
    <?php Utils::deleteSession('category_result') ?>
<?php endif; ?>
<form action="<?=BASE_URL?>category/save&id=<?=$category->getId()?>" method="POST">
    <div class="label-input">
        <label for="category">Category Name</label>
        <?php if(isset($_SESSION['name_category'])): ?>
            <input type="text" name="category" value="<?php echo $_SESSION['name_category']?>" autocomplete="off"/>
            <?php Utils::deleteSession('name_category') ?>
        <?php else: ?>
            <input type="text" name="category" value="<?=$category->getName_category()?>" autocomplete="off"/>
        <?php endif; ?>
    </div>
    <input type="submit" name="update" value="Update" />
</form>


